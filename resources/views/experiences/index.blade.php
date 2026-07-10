@extends('layouts.app')

@section('title', 'Mes Expériences')

@section('content')
    <h1 class="page-title">Mes Expériences Professionnelles</h1>

    @forelse($experiences as $exp)
        <div class="card">
            <h3>{{ $exp->poste }}</h3>
            <div class="meta">{{ $exp->entreprise }} - {{ $exp->lieu }}</div>
            <div class="meta">{{ $exp->date_debut }} à {{ $exp->date_fin ?? 'Présent' }}</div>
            <p>{{ $exp->description }}</p>
        </div>
    @empty
        <p>Aucune expérience enregistrée.</p>
    @endforelse
@endsection