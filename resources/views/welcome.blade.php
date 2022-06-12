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
                        <p class="card-text">Prix : {{ number_format($recette->price,2) }} €</p>
                        <span>
                            {{ $recette->user ? $recette->user->name : '' }}
                        </span>
                        <p>Catégorie :
                        <span class="badge rounded-pill text-bg-info">
                            <a class="text-white" href="{{route('recettes.viewByCategory',['id'=>$recette->category->id])}}">{{ $recette->category->nom }}</a>
                        </span></p>
                        <p>Tags :</p>
                        @foreach($recette->tags as $tag)
                            <span class="badge rounded-pill text-bg-success">
                                <a class="text-white" href="{{route('recettes.viewByTag',['id'=>$tag->id])}}">{{ $tag->nom }}</a>
                            </span>
                        @endforeach
                        <br/>

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
                <h2>Titre : {{ $recette->name }}</h2>
                <p>Prix : {{ number_format($recette->price,2) }} €</p>
                <hr/>
            @endforeach
        @endauth

@endsection
