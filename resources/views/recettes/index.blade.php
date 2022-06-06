@extends('layouts.app')
@section('title', 'Liste des recettes')
@section('content')
    <h1>Liste des recettes</h1>
    <div class="row">
        @foreach ($recettes as $recette)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img class="card-img-top" src="{{ asset($recette->image) }}" alt="{{ $recette->name }}">

                    <div class="card-body">
                        <h5 class="card-title">Titre : {{ $recette->name }}</h5>
                        <p class="card-text">Prix : {{ $recette->price / 100 }} €</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
