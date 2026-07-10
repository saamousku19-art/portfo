@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

@if($presentation)

<section class="hero">

    <div class="hero-card">

        <div class="hero-left">

            <div class="hero-title">

                <h1>
                    PORTFOLIO DE<br>
                    {{ strtoupper($presentation->titre) }}
                </h1>

            </div>

            <div class="hero-biographie">

                <h3>À propos de moi</h3>

                <p>
                    {{ $presentation->contenu }}
                </p>

            </div>

        </div>

        <div class="hero-right">

            @if($presentation->photo)

                <img
                    src="{{ asset('storage/'.$presentation->photo) }}"
                    alt="{{ $presentation->prenom }}"
                >

            @endif

        </div>

    </div>

</section>

@endif

@endsection