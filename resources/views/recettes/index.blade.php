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
                        <p class="card-text">Prix : {{ number_format($recette->price,2) }} €</p>
                        <span class="badge rounded-pill text-bg-info">
                            <a class="text-white" href="{{route('recettes.viewByCategory',['id'=>$recette->category->id])}}">{{ $recette->category->nom }}</a>
                        </span>

                        @foreach($recette->tags as $tag)
                            <span class="badge rounded-pill text-bg-success">
                                <a class="text-white" href="{{route('recettes.viewByTag',['id'=>$tag->id])}}">{{ $tag->nom }}</a>
                            </span>
                        @endforeach

                        <div class="btn-toolbar justify-content-between" role="toolbar">
                            <div class="btn-group me-auto" role="group">
                                <a type="button" class="btn btn-primary" href="{{ route('recettes.show', $recette) }}">
                                    <i class="bi bi-eye"></i>
                                </a>

                                @can('update', $recette)
                                    <a type="button" class="btn btn-primary" href="{{ route('recettes.edit', $recette) }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                @endcan

                                <a type="button" class="btn btn-primary" href="{{ route('recettes.download', $recette) }}">
                                    <i class="bi bi-download"></i>
                                </a>
                                <a type="button" class="btn btn-primary" href="{{ route('recettes.send-mail', $recette) }}">
                                    <i class="bi bi-mailbox"></i>
                                </a>
                            </div>
                            <div class="btn-group me-2" role="group">
                                <form action="{{ route('recettes.destroy', $recette) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
