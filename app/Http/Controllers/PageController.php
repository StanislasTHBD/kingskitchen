<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recette;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $recettes = Recette::orderBy('updated_at', 'desc')
            ->take(3)
            ->get();

        return view('welcome', ['latestRecettes' => $recettes]);
    }
}
