@extends('layouts.app')

@section('title', 'Mes Competences')

@section('content')
    <h1 class="page-title">Mes Competences</h1>

    <ul class="skills-grid">
    @forelse($competences as $comp)
        <li class="card skill-card">
            <strong>{{ $comp->nom }}</strong>
            <span class="skill-category">{{ $comp->categorie }}</span>
            <span class="skill-level">{{ $comp->niveau }}</span>
        </li>
    @empty
        <li class="empty-state">Aucune competence enregistree.</li>
    @endforelse
    </ul>
@endsection
