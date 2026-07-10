@extends('layouts.app')

@section('title', 'Modifier une présentation')

@section('content')
    <h1>Modifier une présentation</h1>

    <form action="{{ route('admin.presentations.update', $presentation) }}" method="POST" enctype="multipart/form-data" class="admin-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="prenom" value="{{ old('prenom', $presentation->prenom) }}" required>
        </div>
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" value="{{ old('nom', $presentation->nom) }}" required>
        </div>
        <div class="form-group">
            <label>Date de naissance</label>
            <input type="date" name="date_naissance" value="{{ old('date_naissance', $presentation->date_naissance) }}" required>
        </div>
        <div class="form-group">
            <label>Lieu de naissance</label>
            <input type="text" name="lieu_naissance" value="{{ old('lieu_naissance', $presentation->lieu_naissance) }}" required>
        </div>
        <div class="form-group">
            <label>Titre</label>
            <input type="text" name="titre" value="{{ old('titre', $presentation->titre) }}">
        </div>
        <div class="form-group">
            <label>Biographie / Présentation</label>
            <textarea name="contenu" rows="5" required>{{ old('contenu', $presentation->contenu) }}</textarea>
        </div>
        <div class="form-group">
            <label>Photo actuelle</label><br>
            @if($presentation->photo)
                <img src="{{ asset('storage/' . $presentation->photo) }}" class="preview-photo">
            @else
                <span>Aucune photo</span>
            @endif
            <br>
            <input type="file" name="photo" accept="image/*">
        </div>
        <div class="form-group">
            <label>Statut</label>
            <select name="statut">
                <option value="publie" {{ $presentation->statut == 'publie' ? 'selected' : '' }}>Publié</option>
                <option value="brouillon" {{ $presentation->statut == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('admin.presentations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
