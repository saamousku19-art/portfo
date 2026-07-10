@extends('layouts.app')

@section('title', 'Mot de passe oublie')

@section('content')
    <section class="auth-page">
        <form action="{{ route('password.email') }}" method="POST" class="auth-card">
            @csrf

            <h1>Mot de passe oublie</h1>
            <p class="auth-intro">Indiquez votre e-mail admin. Laravel enverra un lien securise pour confirmer que c'est bien vous.</p>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer le lien</button>
            <a href="{{ route('login') }}" class="auth-link">Retour a la connexion</a>
        </form>
    </section>
@endsection
