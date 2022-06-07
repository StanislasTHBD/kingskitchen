@extends('layouts.app')
@section('title', $recette->name)

@section('content')

    <form action="{{ route('recettes.update', $recette) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="input-group">
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $recette->name }}"/>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="input-group">
            <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ $recette->description }}"/>
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="input-group">
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $recette->price }}"/>
            @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="input-group">
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ $recette->image }}"/>
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        @if ($recette->image)
            <img src="{{ $recette->image }}" alt="" width="200"/>
        @endif

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
