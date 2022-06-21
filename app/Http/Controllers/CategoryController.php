<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    /**
     * Afficher des Category's.
     *
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }
    /**
     * Créer une Category.
     *
     */
    public function create() {

        return view('category.create');
    }

    public function store(Request $request)
    {
        Category::create([
        'nom' => $request->nom,
        'is_online' => 1,
        ]);

        return Response::redirectToRoute('category.index')->with('status', 'Category created!');

    }
    /**
     * Modifier une Category.
     *
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);

        return view('category.edit', compact('categories', 'id'));
    }

    public function update(Request $request, $id)
    {
        $categories = $request->validate([
            'nom' => 'required|max:255',
            'is_online' => ''
        ]);

        Category::whereId($id)->update($categories);

        return Response::redirectToRoute('category.index',['categories' => $categories])->with('status', 'Category updated!');
    }
    /**
     * Supprimer une Category.
     *
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id)->delete();

        return Response::redirectToRoute('category.index',['categories' => $categories])->with('status', 'Category deleted!');
    }

}
