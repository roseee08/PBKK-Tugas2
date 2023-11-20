<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all(); // Ganti 'author' menjadi 'authors'

        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        // 1. Validasi
        $request->validate([
            'title' => 'required|max:255|unique:books,title',
            'author_id' => 'required|exists:authors,id',
            'description' => 'nullable',
        ]);

        // 2. Masukkan data ke database
        $book = new Book();

        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->description = $request->description;

        $book->save();

        // 3. Redirect
        return redirect()
            ->route('books.index')
            ->with('pesan', 'Data berhasil disimpan');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        // 1. Validasi
        $request->validate([
            'title' => 'required|max:255|unique:books,title,' . $book->id,
            'author_id' => 'required|exists:authors,id', // Ganti 'author' menjadi 'author_id'
            'description' => 'nullable',
        ]);

        // 2. Update
        $book->title = $request->title;
        $book->author_id = $request->author_id; // Ganti 'author' menjadi 'author_id'
        $book->description = $request->description;

        $book->save();

        // 3. Redirect
        return redirect()
            ->route('books.index')
            ->with('pesan', 'Data berhasil diupdate');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('pesan', 'Data berhasil dihapus');
    }
}
