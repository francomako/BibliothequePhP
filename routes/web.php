<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ici, vous pouvez enregistrer les routes web pour votre application. Ces
| routes sont chargées par le RouteServiceProvider et toutes
| seront assignées au groupe de middleware "web".
|
*/

// Section Accueil et livres
Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/livre/{id}', [BookController::class, 'show'])->name('books.show');

// Section Ajout de livre
Route::get('/livre/ajouter', [BookController::class, 'create'])->name('books.create');
Route::post('/livre/ajouter', [BookController::class, 'store'])->name('books.store');

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
