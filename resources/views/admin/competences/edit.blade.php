@extends('layouts.app')

@section('title', 'Modifier une compétence')

@section('content')
    <h1>Modifier une compétence</h1>

    <form action="{{ route('admin.competences.update', $competence) }}" method="POST" class="admin-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nom de la compétence</label>
            <input type="text" name="nom" value="{{ old('nom', $competence->nom) }}" required>
        </div>
        <div class="form-group">
            <label>Catégorie</label>
            <input type="text" name="categorie" value="{{ old('categorie', $competence->categorie) }}">
        </div>
        <div class="form-group">
            <label>Niveau</label>
            <input type="text" name="niveau" value="{{ old('niveau', $competence->niveau) }}">
        </div>
        <div class="form-group">
            <label>Icône</label>
            <input type="text" name="icone" value="{{ old('icone', $competence->icone) }}">
        </div>
        <div class="form-group">
            <label>Ordre d'affichage</label>
            <input type="number" name="ordre" value="{{ old('ordre', $competence->ordre) }}">
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('admin.competences.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
