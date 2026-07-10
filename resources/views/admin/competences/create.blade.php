@extends('layouts.app')

@section('title', 'Ajouter une compétence')

@section('content')
    <h1>Ajouter une compétence</h1>

    <form action="{{ route('admin.competences.store') }}" method="POST" class="admin-form">
        @csrf

        <div class="form-group">
            <label>Nom de la compétence</label>
            <input type="text" name="nom" required>
        </div>
        <div class="form-group">
            <label>Catégorie (ex: Backend, Frontend)</label>
            <input type="text" name="categorie">
        </div>
        <div class="form-group">
            <label>Niveau (ex: Débutant, Intermédiaire, Expert)</label>
            <input type="text" name="niveau">
        </div>
        <div class="form-group">
            <label>Icône (ex: fab fa-php)</label>
            <input type="text" name="icone">
        </div>
        <div class="form-group">
            <label>Ordre d'affichage</label>
            <input type="number" name="ordre" value="0">
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.competences.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
