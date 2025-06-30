<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // 1. Wyświetl listę autorów
    public function index(Request $request)
    {
        $query = Author::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$search}%"]);
        }
        $authors = $query->get();
        return view('authors.index', compact('authors'));
    }

    // 2. Formularz tworzenia nowego autora
    public function create()
    {
        return view('authors.create');
    }

    // 3. Zapis nowego autora do bazy
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        Author::create($validated);

        return redirect()->route('authors.index')->with('success', 'Autor dodany pomyślnie.');
    }

    // 4. Wyświetl szczegóły autora
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    // 5. Formularz edycji autora
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    // 6. Aktualizacja autora w bazie 
    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);

        $author->update($validated);

        return redirect()->route('authors.index')->with('success', 'Autor zaktualizowany pomyślnie.');
    }

    // 7. Usuwanie autora 
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Autor usunięty.');
    }
}
