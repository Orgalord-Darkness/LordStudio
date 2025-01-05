<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategorieController;  

// Route::get('/', [HomeController::class, 'index']);
Route::get('/', function () {
    return view('layouts.app');
});


// Route::get('/categorie', [CategorieController::class,'index']) ; 
// Route::get('/categorie_show', [CategorieController::class,'show']) ; 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/categorie', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categorie/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categorie', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categorie/{id}', [CategorieController::class, 'show'])->name('categories.show');
Route::get('/categorie/{id}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categorie/{id}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categorie/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy');

//routes de Serie
use App\Http\Controllers\SerieController;

Route::resource('serie', SerieController::class);

Route::get('/serie', [SerieController::class, 'index'])->name('serie.index'); // Afficher la liste des séries
Route::get('/serie/create', [SerieController::class, 'create'])->name('serie.create'); // Afficher le formulaire de création
Route::post('/serie', [SerieController::class, 'store'])->name('serie.store'); // Enregistrer une nouvelle série
Route::get('/serie/{id}', [SerieController::class, 'show'])->name('serie.show'); // Afficher une série spécifique
Route::get('/serie/{id}/edit', [SerieController::class, 'edit'])->name('serie.edit'); // Afficher le formulaire d'édition
Route::put('/serie/{id}', [SerieController::class, 'update'])->name('serie.update'); // Mettre à jour une série existante
Route::delete('/serie/{id}', [SerieController::class, 'destroy'])->name('serie.destroy'); // Supprimer une série

//Routes de Image 
use App\Http\Controllers\ImageController;

Route::resource('images', ImageController::class);
// // Afficher la liste des images
// Route::get('/images', [ImageController::class, 'index'])->name('image.index');

// // Afficher le formulaire de création d'une nouvelle image
// Route::get('/image/create', [ImageController::class, 'create'])->name('image.create');

// // Stocker la nouvelle image
// Route::post('/image', [ImageController::class, 'store'])->name('image.store');

// // Afficher une image spécifique
// Route::get('/image/{id}', [ImageController::class, 'show'])->name('image.show');

// // Afficher le formulaire de modification d'une image existante
// Route::get('/image/{id}/edit', [ImageController::class, 'edit'])->name('image.edit');

// // Mettre à jour une image existante
// Route::put('/image/{id}', [ImageController::class, 'update'])->name('image.update');

// // Supprimer une image existante
// Route::delete('/image/{id}', [ImageController::class, 'destroy'])->name('image.destroy');