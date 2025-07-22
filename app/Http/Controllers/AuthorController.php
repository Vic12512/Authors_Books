<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::where('active', true)->get();
        return Inertia::render('Authors/Index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Authors/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'country'=> ['required', 'string', 'max:255']
        ]);


        Author::create($validatedData->only('first_name', 'last_name', 'country'));
        return redirect()->route('authors.index')->with('success', 'Autor creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $author->load('books');
        
        $author->loadCount('books');
        
        return Inertia::render('Authors/Show',[
            'author' => $author
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return Inertia::render('Authors/Edit', [
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'country'=> 'required|string|max:255'
        ]);

        $author->update($request->only('first_name', 'last_name', 'country'));
        return redirect()->route('authors.index');
    }

    /**
     * Hide the specified resource from storage.
     */
    public function softDestroy(Author $author)
    {
        $author->active  = !$author->active;
        $author->save();

        return redirect()->route('authors.index');
    }
}
