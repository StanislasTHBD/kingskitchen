<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');

});
*/

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/categorie/{id}', [RecetteController::class, 'viewByCategory'])->name('recettes.viewByCategory');

Route::get('/tag/{id}', [RecetteController::class, 'viewByTag'])->name('recettes.viewByTag');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/recettes/{recette}/send-mail', [RecetteController::class, 'sendMail'])->name('recettes.send-mail');
Route::get('/recettes/{recette}/download', [RecetteController::class, 'download'])->name('recettes.download');

Route::resource('recettes', RecetteController::class);

Route::get('/recettes/{recette}/edit', [RecetteController::class, 'edit'])
    ->name('recettes.edit')
    ->middleware('can:update,recette');

Route::put('/recettes/{recette}', [RecetteController::class, 'update'])
    ->name('recettes.update')
    ->middleware('can:update,recette');

/*
Route::get('/recettes', [RecetteController::class, 'index'])->name('recettes.index');

Route::get('/recettes/create', [RecetteController::class, 'create'])->name('recettes.create');
Route::post('/recettes', [RecetteController::class, 'store'])->name('recettes.store');

Route::get('/recettes/{recette}', [RecetteController::class, 'show'])->name('recettes.show');

Route::get('/recettes/{recette}/edit', [RecetteController::class, 'edit'])->name('recettes.edit');
Route::put('/recettes/{recette}', [RecetteController::class, 'update'])->name('recettes.update');

Route::delete('/recettes/{recette}', [RecetteController::class, 'destroy'])->name('recettes.destroy');
*/
