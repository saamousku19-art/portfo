@extends('layouts.app')

@section('title', 'Modifier une expérience')

@section('content')
    <h1>Modifier une expérience</h1>

    <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" class="admin-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Poste</label>
            <input type="text" name="poste" value="{{ old('poste', $experience->poste) }}" required>
        </div>
        <div class="form-group">
            <label>Entreprise</label>
            <input type="text" name="entreprise" value="{{ old('entreprise', $experience->entreprise) }}" required>
        </div>
        <div class="form-group">
            <label>Lieu</label>
            <input type="text" name="lieu" value="{{ old('lieu', $experience->lieu) }}">
        </div>
        <div class="form-group">
            <label>Date début</label>
            <input type="date" name="date_debut" value="{{ old('date_debut', $experience->date_debut) }}" required>
        </div>
        <div class="form-group">
            <label>Date fin</label>
            <input type="date" name="date_fin" value="{{ old('date_fin', $experience->date_fin) }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4">{{ old('description', $experience->description) }}</textarea>
        </div>
        <div class="form-group">
            <label>Ordre d'affichage</label>
            <input type="number" name="ordre" value="{{ old('ordre', $experience->ordre) }}">
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
