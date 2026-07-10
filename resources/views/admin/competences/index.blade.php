@extends('layouts.app')

@section('title', 'Admin - Compétences')

@section('content')
    <div class="admin-header">
        <h1>Gestion des Compétences</h1>
        <a href="{{ route('admin.competences.create') }}" class="btn btn-primary">➕ Ajouter</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Niveau</th>
                    <th>Icône</th>
                    <th>Ordre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($competences as $comp)
                <tr>
                    <td>{{ $comp->nom }}</td>
                    <td>{{ $comp->categorie }}</td>
                    <td>{{ $comp->niveau }}</td>
                    <td>{{ $comp->icone }}</td>
                    <td>{{ $comp->ordre }}</td>
                    <td>
                        <a href="{{ route('admin.competences.edit', $comp) }}" class="btn btn-warning btn-sm">✏️</a>
                        <form action="{{ route('admin.competences.destroy', $comp) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">🗑️</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6">Aucune compétence</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
