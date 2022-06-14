<?php

namespace App\Http\Controllers;

use App\Mail\RecetteInfo;
use App\Models\Category;
use App\Models\Recette;
use App\Http\Requests\RecetteRequest;
use App\Models\Tag;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $recettes = Recette::where('category_id',$request->id)->get();

        return Response::view('recettes.create', compact('recettes'));
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
    public function edit(Recette $recette, Request $request)
    {
        $recettes = Recette::where('category_id',$request->id)->get();

        return view('recettes.edit', compact('recette','recettes'));
    }

    /**
     * Update the specified resource in storage.
     *
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

    /**
     * Download PDF.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function download(Recette $recette)
    {
        $pdf = PDF::loadView('recettes.pdf', compact('recette'));

        return $pdf->download(Str::slug($recette->name).'.pdf');
    }

    /**
     * Send Email.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\Response
     */
    public function sendMail(Recette $recette)
    {
        Mail::to('lorem@ipsum.com')->send(new RecetteInfo($recette));

        return Response::redirectToRoute('recettes.index')->with('status', 'Email send!');
    }

    /**
     * Category.
     *
     */
    public function viewByCategory(Request $request) {
        // Récupérer toutes les catégories >> is_online == 1
        //$categories = Category::where('is_online',1)->get();
        // dd($categories);

        $recettes = Recette::where('category_id',$request->id)->get();

        return view('recettes.categorie', compact('recettes'));
    }

    /**
     * Tag.
     *
     */
    public function viewByTag(Request $request) {
        $tag = Tag::find($request->id);
        $recettes = $tag->recettes;
dd($recettes);
        return view('recettes.categorie', compact('recettes', 'tag'));
    }
}
