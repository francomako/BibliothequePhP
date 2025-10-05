<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|

|
*/

// Section Accueil et livres
//Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/', [BookController::class, 'welcome'])->name('welcome');

Route::get('/livre/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/livres', [BookController::class, 'index'])->name('books.index');

// Section Ajout de livre
Route::get('/livre/ajouter', [BookController::class, 'create'])->name('books.create');
Route::post('/livre', [BookController::class, 'store'])->name('books.store');

//modifier un livre
Route::get('/livre/{id}/modifier', [BookController::class, 'edit'])->name('books.edit');
Route::put('/livre/{id}', [BookController::class, 'update'])->name('books.update');

// Section de suppression
Route::delete('/livre/{id}', [BookController::class, 'destroy'])->name('books.destroy');

// Section de recherche et nouveautés
Route::get('/recherche', [BookController::class, 'search'])->name('books.search');
Route::get('/nouveautes', [BookController::class, 'latest'])->name('books.latest');

// Section de contact
Route::get('/contacter', [MessageController::class, 'contact'])->name('contact');
Route::post('/contacter', [MessageController::class, 'store'])->name('contact.store');

// Section des messages
Route::get('/messages', [MessageController::class, 'index'])->name('messages');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

