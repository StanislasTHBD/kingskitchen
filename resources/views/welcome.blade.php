@extends('layouts.app')
@section('title', 'Accueil')

@section('content')
    <h1>Page D'accueil</h1>
    <h2>Nos dernières recettes ...</h2>

    <div class="row">
        @foreach ($latestRecettes as $recette)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img class="card-img-top" src="{{ asset($recette->image) }}" alt="{{ $recette->name }}">

                    <div class="card-body">
                        <h5 class="card-title">Titre : {{ $recette->name }}</h5>
                        <p class="card-text">Prix : {{ $recette->price / 100 }} €</p>
                        <span>
                            {{ $recette->user ? $recette->user->name : '' }}
                        </span>

                        <div class="btn-group" role="group">
                            <a type="button" class="btn btn-primary" href="{{ route('recettes.show', $recette) }}">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @auth
            @foreach(auth()->user()->recettes as $recette)
                <h2>{{ $recette->name }}</h2>
                <p>{{ $recette->price / 100 }} €</p>
                <hr/>
            @endforeach
        @endauth

@endsection
