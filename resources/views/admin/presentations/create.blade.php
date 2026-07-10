@extends('layouts.app')

@section('title', 'Ajouter une présentation')

@section('content')
    <h1>Ajouter une présentation</h1>

    <form action="{{ route('admin.presentations.store') }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf

        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" required>
        </div>
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" required>
        </div>
        <div class="form-group">
            <label>Date de naissance</label>
            <input type="date" name="date_naissance" required>
        </div>
        <div class="form-group">
            <label>Lieu de naissance</label>
            <input type="text" name="lieu_naissance" required>
        </div>
        <div class="form-group">
            <label>Titre (ex: Développeur Web)</label>
            <input type="text" name="titre">
        </div>
        <div class="form-group">
            <label>Biographie / Présentation</label>
            <textarea name="contenu" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label>Photo de profil</label>
            <input type="file" name="photo" accept="image/*">
        </div>
        <div class="form-group">
            <label>Statut</label>
            <select name="statut">
                <option value="publie">Publié</option>
                <option value="brouillon">Brouillon</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.presentations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
