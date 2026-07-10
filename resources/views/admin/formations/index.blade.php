@extends('layouts.app')

@section('title', 'Admin - Formations')

@section('content')
    <div class="admin-header">
        <h1>Gestion des Formations</h1>
        <a href="{{ route('admin.formations.create') }}" class="btn btn-primary">➕ Ajouter</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Diplôme</th>
                    <th>École</th>
                    <th>Lieu</th>
                    <th>Années</th>
                    <th>Ordre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($formations as $formation)
                <tr>
                    <td>{{ $formation->diplome }}</td>
                    <td>{{ $formation->ecole }}</td>
                    <td>{{ $formation->lieu }}</td>
                    <td>{{ $formation->annee_debut }} - {{ $formation->annee_fin ?? '...' }}</td>
                    <td>{{ $formation->ordre }}</td>
                    <td>
                        <a href="{{ route('admin.formations.edit', $formation) }}" class="btn btn-warning btn-sm">✏️</a>
                        <form action="{{ route('admin.formations.destroy', $formation) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">🗑️</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6">Aucune formation</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
