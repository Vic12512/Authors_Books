<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Inertia\Inertia;

//ruta pagina principal
Route::inertia('/','Home')->name('home');

//rutas de Author
//vista general de autor
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');

//creacion de autor
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');

//edicion de autor
Route::get('/authors/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
Route::put('/authors/{author}', [AuthorController::class, 'update'])->name('authors.update');

//oculta autor
Route::delete('/authors/{author}', [AuthorController::class, 'softDestroy'])->name('authors.softDestroy');

//vista detallada de autor
Route::get('/authors/{author}', [AuthorController::class, 'show'])->name('authors.show');


//rutas de Book
//vista general de libro
Route::get('/books', [BookController::class, 'index'])->name('books.index');

//creacion de libro
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');

//edicion de libro
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');

//borra un libro
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

//vista detallada de libro
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');