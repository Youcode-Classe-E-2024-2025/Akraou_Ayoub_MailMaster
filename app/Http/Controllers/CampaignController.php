<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;

class CampaignController extends Controller
{
    public function index()
    {
        try {
            $campaigns = Campaign::with('newsletter')->get();
            return response()->json(['status' => 'success', 'data' => $campaigns], 200);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Erreur lors de la récupération des campagnes', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'newsletter_id' => 'required|exists:newsletters,id',
                'scheduled_at' => 'required|date',
                'status' => 'required|string|in:scheduled,sent,draft',
            ]);

            $campaign = Campaign::create($validated);

            return response()->json(['status' => 'success', 'message' => 'Campagne créée avec succès', 'data' => $campaign], 201);
        } catch (ValidationException $e) {
            return response()->json(['status' => 'error', 'message' => 'Erreur de validation', 'errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Erreur lors de la création de la campagne', 'error' => $e->getMessage()], 500);
        }
    }
    }
}
