<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PresentationController extends Controller
{
    // === AFFICHAGE PUBLIC (page d'accueil) ===
    public function publicIndex()
    {
        $presentation = Presentation::first(); // une seule ligne
        return view('accueil', compact('presentation'));
    }

    // === ADMIN : LISTE ===
    public function index()
    {
        $presentations = Presentation::all();
        return view('admin.presentations.index', compact('presentations'));
    }

    // === ADMIN : FORMULAIRE DE CRÉATION ===
    public function create()
    {
        return view('admin.presentations.create');
    }

    // === ADMIN : ENREGISTRER (avec gestion de photo) ===
    public function store(Request $request)
    {
        $request->validate([
            'prenom'         => 'required|string|max:255',
            'nom'            => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'titre'          => 'nullable|string|max:255',
            'contenu'        => 'required|string',
            'photo'          => 'nullable|image|max:2048', // 2 Mo
            'statut'         => 'required|in:publie,brouillon',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        Presentation::create($data);

        return redirect()->route('admin.presentations.index')
                         ->with('success', 'Présentation ajoutée.');
    }

    // === ADMIN : FORMULAIRE D'ÉDITION ===
    public function edit(Presentation $presentation)
    {
        return view('admin.presentations.edit', compact('presentation'));
    }

    // === ADMIN : METTRE À JOUR ===
    public function update(Request $request, Presentation $presentation)
    {
        $request->validate([
            'prenom'         => 'required|string|max:255',
            'nom'            => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'titre'          => 'nullable|string|max:255',
            'contenu'        => 'required|string',
            'photo'          => 'nullable|image|max:30000',
            'statut'         => 'required|in:publie,brouillon',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo
            if ($presentation->photo) {
                Storage::disk('public')->delete($presentation->photo);
            }
            $path = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $path;
        }

        $presentation->update($data);

        return redirect()->route('admin.presentations.index')
                         ->with('success', 'Présentation mise à jour.');
    }

    // === ADMIN : SUPPRIMER ===
    public function destroy(Presentation $presentation)
    {
        if ($presentation->photo) {
            Storage::disk('public')->delete($presentation->photo);
        }
        $presentation->delete();

        return redirect()->route('admin.presentations.index')
                         ->with('success', 'Présentation supprimée.');
    }
}