<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    // === AFFICHAGE PUBLIC ===
    public function publicIndex()
    {
        $formations = Formation::orderBy('annee_debut', 'desc')->get();
        return view('formations.index', compact('formations'));
    }

    // === ADMIN : LISTE ===
    public function index()
    {
        $formations = Formation::orderBy('ordre')->get();
        return view('admin.formations.index', compact('formations'));
    }

    // === ADMIN : FORMULAIRE DE CRÉATION ===
    public function create()
    {
        return view('admin.formations.create');
    }

    // === ADMIN : ENREGISTRER ===
    public function store(Request $request)
    {
        $request->validate([
            'diplome'      => 'required|string|max:255',
            'ecole'        => 'required|string|max:255',
            'lieu'         => 'nullable|string|max:255',
            'annee_debut'  => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'annee_fin'    => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'description'  => 'nullable|string',
            'ordre'        => 'nullable|integer',
        ]);

        Formation::create($request->all());

        return redirect()->route('admin.formations.index')
                         ->with('success', 'Formation ajoutée.');
    }

    // === ADMIN : FORMULAIRE D'ÉDITION ===
    public function edit(Formation $formation)
    {
        return view('admin.formations.edit', compact('formation'));
    }

    // === ADMIN : METTRE À JOUR ===
    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'diplome'      => 'required|string|max:255',
            'ecole'        => 'required|string|max:255',
            'lieu'         => 'nullable|string|max:255',
            'annee_debut'  => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'annee_fin'    => 'nullable|digits:4|integer|min:1900|max:' . date('Y'),
            'description'  => 'nullable|string',
            'ordre'        => 'nullable|integer',
        ]);

        $formation->update($request->all());

        return redirect()->route('admin.formations.index')
                         ->with('success', 'Formation mise à jour.');
    }

    // === ADMIN : SUPPRIMER ===
    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('admin.formations.index')
                         ->with('success', 'Formation supprimée.');
    }
}