<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vignette;

class VignetteController extends Controller
{
    /**
     * Affiche la liste des vignettes.
     */
    public function index()
    {
        $vignettes = Vignette::all(); // Récupère toutes les vignettes

        return view('pages.voir_vignettes', compact('vignettes'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle vignette.
     */
    public function create()
    {
        return view('pages.creer_vignette'); // Assure-toi que cette vue existe
    }

    /**
     * Enregistre une nouvelle vignette dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $vignette = new Vignette();
        $vignette->title = $request->title;
        $vignette->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('vignettes', 'public');
            $vignette->image = $path;
        }

        $vignette->save();

        return redirect()->route('vignettes.index')->with('success', 'Vignette créée avec succès.');
    }

    /**
     * Affiche une vignette en particulier.
     */
    public function show($id)
    {
        $vignette = Vignette::findOrFail($id);

        return view('pages.voir_vignette_detail', compact('vignette')); // Crée cette vue si besoin
    }
}
