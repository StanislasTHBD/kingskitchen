<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TagController extends Controller
{
    /**
     * Afficher des Category's.
     *
     */
    public function index()
    {
        $tags = Tag::all();

        return view('tag.index', compact('tags'));
    }
    /**
     * Créer une Category.
     *
     */
    public function create() {

        return view('tag.create');
    }

    public function store(Request $request)
    {
        Tag::create([
            'nom' => $request->nom,
        ]);
        return Response::redirectToRoute('tag.index')->with('status', 'Tag created!');

    }
    /**
     * Modifier une Category.
     *
     */
    public function edit($id)
    {
        $tags = Tag::findOrFail($id);

        return view('tag.edit', compact('tags', 'id'));
    }

    public function update(Request $request, $id)
    {
        $tags = $request->validate([
            'nom' => 'required|max:255',
        ]);

        Tag::whereId($id)->update($tags);

        return Response::redirectToRoute('tag.index',['tags' => $tags])->with('status', 'Tag updated!');
    }
    /**
     * Supprimer une Category.
     *
     */
    public function destroy($id)
    {
        $tags = Tag::findOrFail($id)->delete();

        return Response::redirectToRoute('tag.index',['tags' => $tags])->with('status', 'Tag deleted!');
    }
}
