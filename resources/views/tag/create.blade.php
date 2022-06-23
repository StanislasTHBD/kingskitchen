@extends('layouts.app')
@section('title', 'Créer un tag')

@section('content')


    <form action="{{ route('tag.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Créer un tag</h1>
        <label for="nom" class="form-label">Nom du tag :</label>
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
