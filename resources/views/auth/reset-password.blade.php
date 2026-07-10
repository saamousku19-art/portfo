@extends('layouts.app')

@section('title', 'Nouveau mot de passe')

@section('content')
    <section class="auth-page">
        <form action="{{ route('password.update') }}" method="POST" class="auth-card">
            @csrf

            <h1>Nouveau mot de passe</h1>
            <p class="auth-intro">Choisissez un mot de passe solide pour proteger votre espace admin.</p>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email', $email) }}" autocomplete="email" required>
            </div>

            <div class="form-group">
                <label for="password">Nouveau mot de passe</label>
                <input id="password" type="password" name="password" autocomplete="new-password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>
            </div>

            <button type="submit" class="btn btn-primary">Reinitialiser</button>
        </form>
    </section>
@endsection
