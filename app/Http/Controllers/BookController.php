<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'category'])->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_date' => 'nullable|date',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'is_available' => 'boolean',
        ]);
        Book::create($validated);
        return redirect()->route('books.index')->with('success', 'Książka dodana pomyślnie.');
    }

    public function show(Book $book)
    {
        $book->load(['author', 'category']);
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_date' => 'nullable|date',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'is_available' => 'boolean',
        ]);
        $book->update($validated);
        return redirect()->route('books.index')->with('success', 'Książka zaktualizowana pomyślnie.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Książka usunięta.');
    }
} 