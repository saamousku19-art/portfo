@extends('layouts.app')

@section('title', 'Ajouter une expérience')

@section('content')
    <h1>Ajouter une expérience</h1>

    <form action="{{ route('admin.experiences.store') }}" method="POST" class="admin-form">
        @csrf

        <div class="form-group">
            <label>Poste</label>
            <input type="text" name="poste" required>
        </div>
        <div class="form-group">
            <label>Entreprise</label>
            <input type="text" name="entreprise" required>
        </div>
        <div class="form-group">
            <label>Lieu</label>
            <input type="text" name="lieu">
        </div>
        <div class="form-group">
            <label>Date début</label>
            <input type="date" name="date_debut" required>
        </div>
        <div class="form-group">
            <label>Date fin (laisser vide si en cours)</label>
            <input type="date" name="date_fin">
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
        <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
