@extends('layouts.app')

@section('title', $recette->name)

@section('content')

    <h1>Titre : {{ $recette->name }}</h1>

    <p>Catégorie :
<span class="badge rounded-pill text-bg-info">
    <a class="text-white" href="{{route('recettes.viewByCategory',['id'=>$recette->category->id])}}">{{ $recette->category->nom }}</a>
</span></p>
<div>
<p>Tags :</p>
    @foreach($recette->tags as $tag)
        <span class="badge rounded-pill text-bg-success">
        <a class="text-white" href="{{route('recettes.viewByTag',['id'=>$tag->id])}}">{{ $tag->nom }}</a>
    </span>
    @endforeach
</div>
<h2>Description :</h2>
<p>{{ $recette->description }}</p>
<p>Prix : {{ number_format($recette->price,2) }} €</p>
<!--
<p>Prix : {{ $recette->price / 100 }} €</p>
-->

<img src="{{ asset($recette->image) }}" atl="" width="800"/>
@endsection
