<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use Inertia\Inertia;

//ruta pagina principal
Route::inertia('/','Home')->name('home');

//rutas de Author
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
Route::get('/authors/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
Route::put('/authors/{author}', [AuthorController::class, 'update'])->name('authors.update');
Route::delete('/authors/{author}', [AuthorController::class, 'softDestroy'])->name('authors.softDestroy');


