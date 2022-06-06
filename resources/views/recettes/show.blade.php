@extends('layouts.app')

@section('title', $recette->name)

@section('content')

    <h1>Titre : {{ $recette->name }}</h1>

    <h2>Description :</h2>
    <p>{{ $recette->description }}</p>
    <p>Prix : {{ $recette->price / 100 }} €</p>

    <img src="{{ asset($recette->image) }}" atl=""/>
@endsection
