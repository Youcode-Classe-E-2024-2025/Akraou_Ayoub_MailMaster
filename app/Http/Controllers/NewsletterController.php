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

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}
