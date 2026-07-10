@extends('layouts.app')

@section('title', 'Connexion admin')

@section('content')
    <section class="auth-page">
        <form action="{{ route('login.store') }}" method="POST" class="auth-card">
            @csrf

            <h1>Connexion admin</h1>
            <p class="auth-intro">Acces reserve au proprietaire du portfolio.</p>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" autocomplete="current-password" required>
            </div>

            <label class="check-row">
                <input type="checkbox" name="remember" value="1">
                <span>Rester connecte</span>
            </label>

            <button type="submit" class="btn btn-primary">Se connecter</button>

            <a href="{{ route('password.request') }}" class="auth-link">Mot de passe oublie ?</a>
        </form>
    </section>
@endsection
