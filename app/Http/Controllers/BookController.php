<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        return Inertia::render('Books/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'publication_date' => 'required',
            'edition'=> 'required'
        ]);

        Book::create($request->only('name', 'publication_date', 'edition'));
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return Inertia::render('Books/Edit', [
            'book' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'publication_date' => 'required',
            'edition'=> 'required|string|max:255'
        ]);

        $author->update($request->only('name', 'publication_date', 'edition'));
        return redirect()->route('books.index');
    }

    /**
     * Destroy the specified resource from storage.
     */
    public function Destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
