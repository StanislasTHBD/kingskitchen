<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use App\Http\Requests\RecetteRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;


class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recettes = Recette::all();

        return view('recettes.index', compact('recettes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Response::view('recettes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecetteRequest $request)
    {
        $recette = Recette::create($request->validated());
        $recette->user()->associate($request->user());

        if ($request->hasFile('image')) {
            $request->file('image')->store('public/recettes');

            $recette->image = 'storage/recettes/'.$request->file('image')->hashName();
            $recette->save();
        }

        return Response::redirectToRoute('recettes.show', $recette)->with('status', 'Recette created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function show(Recette $recette)
    {
        return view('recettes.show', compact('recette'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function edit(Recette $recette)
    {
        return view('recettes.edit', compact('recette'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function update(RecetteRequest $request, Recette $recette)
    {
        $recette->update($request->validated());

        if ($request->hasFile('image')) {
            $request->file('image')->store('public/recettes');

            $recette->image = 'storage/recettes/'.$request->file('image')->hashName();
            $recette->save();
        }

        return Response::redirectToRoute('recettes.show',['recette' => $recette])->with('status', 'Recette updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recette $recette)
    {
        $recette->delete();

        return Response::redirectToRoute('recettes.index',['recette' => $recette])->with('status', 'Recette deleted!');
    }
}
