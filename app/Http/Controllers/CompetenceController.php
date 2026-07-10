<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    // === AFFICHAGE PUBLIC ===
    public function publicIndex()
    {
        $competences = Competence::orderBy('ordre')->get();
        return view('competences.index', compact('competences'));
    }

    // === ADMIN : LISTE ===
    public function index()
    {
        $competences = Competence::orderBy('ordre')->get();
        return view('admin.competences.index', compact('competences'));
    }

    // === ADMIN : FORMULAIRE DE CRÉATION ===
    public function create()
    {
        return view('admin.competences.create');
    }

    // === ADMIN : ENREGISTRER ===
    public function store(Request $request)
    {
        $request->validate([
            'nom'       => 'required|string|max:255',
            'categorie' => 'nullable|string|max:255',
            'niveau'    => 'nullable|string|max:255',
            'icone'     => 'nullable|string|max:255',
            'ordre'     => 'nullable|integer',
        ]);

        Competence::create($request->all());

        return redirect()->route('admin.competences.index')
                         ->with('success', 'Compétence ajoutée.');
    }

    // === ADMIN : FORMULAIRE D'ÉDITION ===
    public function edit(Competence $competence)
    {
        return view('admin.competences.edit', compact('competence'));
    }

    // === ADMIN : METTRE À JOUR ===
    public function update(Request $request, Competence $competence)
    {
        $request->validate([
            'nom'       => 'required|string|max:255',
            'categorie' => 'nullable|string|max:255',
            'niveau'    => 'nullable|string|max:255',
            'icone'     => 'nullable|string|max:255',
            'ordre'     => 'nullable|integer',
        ]);

        $competence->update($request->all());

        return redirect()->route('admin.competences.index')
                         ->with('success', 'Compétence mise à jour.');
    }

    // === ADMIN : SUPPRIMER ===
    public function destroy(Competence $competence)
    {
        $competence->delete();
        return redirect()->route('admin.competences.index')
                         ->with('success', 'Compétence supprimée.');
    }
}