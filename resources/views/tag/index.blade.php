@extends('layouts.app')
@section('title', 'Liste des Categories')
@section('content')


    <h1>Tags:</h1>

    <a type="button" class="btn btn-primary" href="{{ route('tag.create') }}">Créer un tag</a>
    <br/>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <th scope="row">{{$tag->id}}</th>
                <td>{{$tag->nom}}</td>
                <td>
                    <a type="button" class="btn btn-primary" href="{{ route('tag.edit', $tag) }}">
                        <i class="bi bi-pencil-square">Update</i>
                    </a>

                    <div class="btn-group me-2" role="group">
                        <form action="{{ route('tag.destroy', $tag->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
