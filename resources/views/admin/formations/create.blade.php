@extends('layouts.app')

@section('title', 'Ajouter une formation')

@section('content')
    <h1>Ajouter une formation</h1>

    <form action="{{ route('admin.formations.store') }}" method="POST" class="admin-form">
        @csrf

        <div class="form-group">
            <label>Diplôme</label>
            <input type="text" name="diplome" required>
        </div>
        <div class="form-group">
            <label>École / Université</label>
            <input type="text" name="ecole" required>
        </div>
        <div class="form-group">
            <label>Lieu</label>
            <input type="text" name="lieu">
        </div>
        <div class="form-group">
            <label>Année de début</label>
            <input type="number" name="annee_debut" min="1900" max="{{ date('Y') }}" required>
        </div>
        <div class="form-group">
            <label>Année de fin (laisser vide si en cours)</label>
            <input type="number" name="annee_fin" min="1900" max="{{ date('Y') }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label>Ordre d'affichage</label>
            <input type="number" name="ordre" value="0">
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
