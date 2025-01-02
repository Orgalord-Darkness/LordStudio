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


