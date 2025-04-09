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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
