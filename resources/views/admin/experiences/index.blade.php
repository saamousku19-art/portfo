@extends('layouts.app')

@section('title', 'Admin - Experiences')

@section('content')
    <div class="admin-header">
        <h1>Gestion des Experiences</h1>
        <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary">Ajouter</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Poste</th>
                    <th>Entreprise</th>
                    <th>Lieu</th>
                    <th>Dates</th>
                    <th>Ordre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($experiences as $exp)
                <tr>
                    <td>{{ $exp->poste }}</td>
                    <td>{{ $exp->entreprise }}</td>
                    <td>{{ $exp->lieu }}</td>
                    <td>{{ $exp->date_debut }} - {{ $exp->date_fin ?? 'Present' }}</td>
                    <td>{{ $exp->ordre }}</td>
                    <td>
                        <a href="{{ route('admin.experiences.edit', $exp) }}" class="btn btn-warning btn-sm">Editer</a>
                        <form action="{{ route('admin.experiences.destroy', $exp) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6">Aucune experience</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
