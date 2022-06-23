@extends('layouts.app')
@section('title', 'Modifier un tag')

@section('content')


    <form action="{{ route('tag.update', $id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <label for="nom" class="form-label">Nom du tag :</label>
        <div class="input-group">
            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ $tags->nom }}"/>
            @error('nom')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <br/><br/>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>

@endsection
