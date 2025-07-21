<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use Inertia\Inertia;

//ruta pagina principal
Route::inertia('/','Home')->name('home');

//rutas de Author
Route::get('/authors', [AuthorController::class, 'index'])->name('author.index');