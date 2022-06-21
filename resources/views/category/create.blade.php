@extends('layouts.app')
@section('title', 'Créer une categorie')

@section('content')


    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Créer une catégorie</h1>
        <label for="nom" class="form-label">Nom de la catégorie :</label>
        <div class="input-group">
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}"/>
            @error('nom')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <br/>
        <button type="submit" class="btn btn-primary">Créer</button>

    </form>



@endsection
