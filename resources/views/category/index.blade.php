@extends('layouts.app')
@section('title', 'Liste des Categories')
@section('content')

<h1>Catégories:</h1>

<a type="button" class="btn btn-primary" href="{{ route('category.create') }}">Créer une catégorie</a>
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
    @foreach($categories as $categorie)
        <tr>
            <th scope="row">{{$categorie->id}}</th>
            <td>{{$categorie->nom}}</td>
            <td>
                <a type="button" class="btn btn-primary" href="{{ route('category.edit', $categorie) }}">
                    <i class="bi bi-pencil-square">Update</i>
                </a>

                <div class="btn-group me-2" role="group">
                    <form action="{{ route('category.destroy', $categorie->id) }}" method="post">
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
