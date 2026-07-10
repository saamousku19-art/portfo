@extends('layouts.app')

@section('title', 'Modifier une formation')

@section('content')
    <h1>Modifier une formation</h1>

    <form action="{{ route('admin.formations.update', $formation) }}" method="POST" class="admin-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Diplôme</label>
            <input type="text" name="diplome" value="{{ old('diplome', $formation->diplome) }}" required>
        </div>
        <div class="form-group">
            <label>École</label>
            <input type="text" name="ecole" value="{{ old('ecole', $formation->ecole) }}" required>
        </div>
        <div class="form-group">
            <label>Lieu</label>
            <input type="text" name="lieu" value="{{ old('lieu', $formation->lieu) }}">
        </div>
        <div class="form-group">
            <label>Année de début</label>
            <input type="number" name="annee_debut" value="{{ old('annee_debut', $formation->annee_debut) }}" required>
        </div>
        <div class="form-group">
            <label>Année de fin</label>
            <input type="number" name="annee_fin" value="{{ old('annee_fin', $formation->annee_fin) }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4">{{ old('description', $formation->description) }}</textarea>
        </div>
        <div class="form-group">
            <label>Ordre d'affichage</label>
            <input type="number" name="ordre" value="{{ old('ordre', $formation->ordre) }}">
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('admin.formations.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
