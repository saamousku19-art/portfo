@extends('layouts.app')

@section('title', 'Mes Formations')

@section('content')
    <h1 class="page-title">Mes Formations</h1>

    @forelse($formations as $formation)
        <div class="card">
            <h3>{{ $formation->diplome }}</h3>
            <div class="meta">{{ $formation->ecole }} - {{ $formation->lieu }}</div>
            <div class="meta">{{ $formation->annee_debut }} à {{ $formation->annee_fin ?? 'Aujourd\'hui' }}</div>
            <p>{{ $formation->description }}</p>
        </div>
    @empty
        <p>Aucune formation enregistrée.</p>
    @endforelse
@endsection