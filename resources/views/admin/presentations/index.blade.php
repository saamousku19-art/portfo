@extends('layouts.app')

@section('title', 'Admin - Présentations')

@section('content')
    <div class="admin-header">
        <h1>Gestion des Présentations</h1>
        <a href="{{ route('admin.presentations.create') }}" class="btn btn-primary">➕ Ajouter</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nom complet</th>
                    <th>Date naissance</th>
                    <th>Titre</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($presentations as $pres)
                <tr>
                    <td>{{ $pres->prenom }} {{ $pres->nom }}</td>
                    <td>{{ $pres->date_naissance }}</td>
                    <td>{{ $pres->titre }}</td>
                    <td>{{ $pres->statut }}</td>
                    <td>
                        <a href="{{ route('admin.presentations.edit', $pres) }}" class="btn btn-warning btn-sm">✏️</a>
                        <form action="{{ route('admin.presentations.destroy', $pres) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">🗑️</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5">Aucune présentation</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
