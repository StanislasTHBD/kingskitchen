@extends('layouts.app')
@section('title', 'Créer une recette')

@section('content')

    <form action="{{ route('recettes.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Créer une recette</h1>
        <label for="name" class="form-label">Nom de la recette :</label>
        <div class="input-group">
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <label for="name" class="form-label">Description :</label>
        <div class="input-group">
            <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"/>
            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <label for="name" class="form-label">Prix :</label>
        <div class="input-group">
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"/>
            @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <label for="name" class="form-label">Image :</label>
        <div class="input-group">
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value=""/>
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <br/>
        <p>Catégorie :</p>
        <div>
            <select class="form-select" aria-label="Default select example">
                <option selected>Catégorie...</option>
                @foreach ($categories as $category)
                <option value="">{{$category->nom}}</option>
                @endforeach
            </select>
        </div>
        <br/>
        <p>Tags :</p>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">1</label>
            </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">2</label>
        </div>

        <br/>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
