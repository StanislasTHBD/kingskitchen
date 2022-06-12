@extends('layouts.app')

@section('title', $recette->name)

@section('content')

    <h1>Titre : {{ $recette->name }}</h1>

    <h2>Description :</h2>
    <p>{{ $recette->description }}</p>
    <p>Prix : {{ $recette->price / 100 }} €</p>
    <!--
    <p>Prix : {{ number_format($recette->price,2) }} €</p>
    -->

    @foreach($recette->tags as $tag)
    <span class="badge rounded-pill text-bg-success">
        <a class="text-white" href="{{route('recettes.viewByTag',['id'=>$tag->id])}}">{{ $tag->nom }}</a>
    </span>
    @endforeach

    <img src="{{ asset($recette->image) }}" atl="" width="800"/>
@endsection
