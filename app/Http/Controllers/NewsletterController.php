<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Affiche la liste de toutes les newsletters.
     */
    public function index()
    {
        $newsletters = Newsletter::all();
        return response()->json(['status' => 'success', 'data' => $newsletters]);
    }

    /**
     * Crée une nouvelle newsletter.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $newsletter = Newsletter::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Newsletter créée avec succès',
            'data' => $newsletter,
        ], 201);
    }

    /**
     * Affiche une newsletter spécifique.
     */
    public function show(string $id)
    {
        $newsletter = Newsletter::find($id);

        if (!$newsletter) {
            return response()->json(['status' => 'error', 'message' => 'Newsletter non trouvée'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $newsletter]);
    }

    /**
     * Met à jour une newsletter spécifique.
     */
    public function update(Request $request, string $id)
    {
        $newsletter = Newsletter::find($id);

        if (!$newsletter) {
            return response()->json(['status' => 'error', 'message' => 'Newsletter non trouvée'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        $newsletter->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Newsletter mise à jour avec succès',
            'data' => $newsletter,
        ]);
    }
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}
