<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Inertia\Inertia;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Error producido por sintaxis $books = Books::all(); en la cual la "S" producia un error de Class nor found
        $books = Book::all(); 
        return Inertia::render('Books/Index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all(['id', 'first_name', 'last_name']);
        return Inertia::render('Books/Create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'publication_date' => 'required',
            'edition'=> 'required',
            'authors'=> 'required|array|min:1',
            'authors.*'=> 'exists:authors,id',
        ]);

        $book = Book::create([
            'name' => $validated['name'],
            'publication_date' => $validated['publication_date'],
            'edition'=> $validated['edition'],
        ]);

        $book->authors()->sync($validated['authors']);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {

         $book->load('authors');
            
        return Inertia::render('Books/Show',[
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $book->load('authors');
        $authors = Author::all(['id', 'first_name', 'last_name']);

        return Inertia::render('Books/Edit', [
            'book' => $book,
            'authors' => $authors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'publication_date' => 'required',
            'edition'=> 'required|string|max:255',
            'authors'=> 'required|array|min:1',
            'authors.*'=> 'exists:authors,id',
        ]);

        /* $book = Book::update([
            'name' => $validated['name'],
            'publication_date' => $validated['publication_date'],
            'edition'=> $validated['edition'],
        ]); */

        $book->update([
            'name' => $validated['name'],
            'publication_date' => $validated['publication_date'],
            'edition'=> $validated['edition'],
        ]); 

        $book->authors()->sync($validated['authors']);
        return redirect()->route('books.index');
    }

    /**
     * Destroy the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
