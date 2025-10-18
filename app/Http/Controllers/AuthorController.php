<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    
    public function create()
    {
        return view('authors.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'nationality' => 'required|string|max:100',
        ]);

        Author::create($request->all());
        return redirect()->route('authors.index')->with('success', 'Autor creado correctamente.');
    }

    
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'nationality' => 'required|string|max:100',
        ]);

        $author->update($request->all());
        return redirect()->route('authors.index')->with('success', 'Autor actualizado correctamente.');
    }

    
    public function destroy(Author $author)
    {
        if ($author->books()->count() > 0) {
            return redirect()->route('authors.index')->with('success', 'No se puede eliminar: el autor tiene libros asociados.');
        }

        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Autor eliminado correctamente.');
    }
}
