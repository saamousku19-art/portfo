<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    // === AFFICHAGE PUBLIC (pour les visiteurs) ===
    public function publicIndex()
    {
        $experiences = Experience::orderBy('date_debut', 'desc')->get();
        return view('experiences.index', compact('experiences'));
    }

    // === ADMINISTRATION : LISTE ===
    public function index()
    {
        $experiences = Experience::orderBy('ordre')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    // === ADMIN : FORMULAIRE DE CRÉATION ===
    public function create()
    {
        return view('admin.experiences.create');
    }

    // === ADMIN : ENREGISTRER ===
    public function store(Request $request)
    {
        $request->validate([
            'poste'        => 'required|string|max:255',
            'entreprise'   => 'required|string|max:255',
            'lieu'         => 'nullable|string|max:255',
            'date_debut'   => 'required|date',
            'date_fin'     => 'nullable|date|after:date_debut',
            'description'  => 'nullable|string',
            'ordre'        => 'nullable|integer',
        ]);

        Experience::create($request->all());

        return redirect()->route('admin.experiences.index')
                         ->with('success', 'Expérience ajoutée avec succès.');
    }

    // === ADMIN : FORMULAIRE D'ÉDITION ===
    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    // === ADMIN : METTRE À JOUR ===
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'poste'        => 'required|string|max:255',
            'entreprise'   => 'required|string|max:255',
            'lieu'         => 'nullable|string|max:255',
            'date_debut'   => 'required|date',
            'date_fin'     => 'nullable|date|after:date_debut',
            'description'  => 'nullable|string',
            'ordre'        => 'nullable|integer',
        ]);

        $experience->update($request->all());

        return redirect()->route('admin.experiences.index')
                         ->with('success', 'Expérience mise à jour.');
    }

    // === ADMIN : SUPPRIMER ===
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')
                         ->with('success', 'Expérience supprimée.');
    }
}