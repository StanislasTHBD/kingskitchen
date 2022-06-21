@extends('layouts.app')
@section('title', 'Modifier une categorie')

@section('content')


    <form action="{{ route('category.update', $id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <label for="nom" class="form-label">Nom de la catégorie :</label>
        <div class="input-group">
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ $categories->nom }}"/>
            @error('nom')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

//Mettre un bouton activer ou desactiver pour le is_online

        <br/><br/>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>

@endsection
