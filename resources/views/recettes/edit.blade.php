@extends('layouts.app')
@section('title', $recette->name)

@section('content')

    <form action="{{ route('recettes.update', $recette) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <label for="name" class="form-label">Nom de la recette :</label>
        <div class="input-group">
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $recette->name }}"/>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <br/>
        <label for="name" class="form-label">Description :</label>
        <div class="input-group">
            <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ $recette->description }}"/>
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <br/>
        <label for="name" class="form-label">Prix :</label>
        <div class="input-group">
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $recette->price }}"/>
            @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <br/>
        <label for="name" class="form-label">Image :</label>
        <div class="input-group">
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ $recette->image }}"/>
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <br/>
        <label for="name" class="form-label">Image actuel :</label>
        <br/><br/>
        @if ($recette->image)
            <img src="{{ asset($recette->image) }}" atl="" width="500"/>
        @endif
        <br/><br/>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
