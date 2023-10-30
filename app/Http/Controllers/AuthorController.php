<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all(); //nama tabel database = controller Author

        return view('author.index', compact('authors')); //return view index, compact dari table database
    }
    public function create()
    {
        return view('author.create');
    }
    public function store(Request $request)
    {
        //1. validasi
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:authors,email',
            'address' => 'nullable',
        ]);

        //2. masukan data ke database
        $Author = new Author();

        $Author->name = $request->name; 
        $Author->email = $request->email;
        $Author->address = $request->address;

        $Author->save();

        //3. redirect
        return redirect()
            ->route('author.index')
            ->with('pesan', 'Data berhasil disimpan');
    }
    public function show(Author $Author)  // menampilkan data Author yang disimpam di variable $Author
    {
        return view('author.show', compact('Author')); //compact mengambil nilai yang telah disimpan di variable ($Author)
    }

    public function edit(Author $Author)
    {
        return view('author.edit', compact('Author'));
    }
    public function update(Request $request , Author $Author)//request digunakan untuk mengambil data dari form, dan author untuk mengambil data author di database
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:authors,email,' . $Author->id,
            'address' => 'nullable',
        ]);

        $Author->name = $request->name; 
        $Author->email = $request->email;
        $Author->address = $request->address;
        $Author->save();

        return redirect()
            ->route('author.index')
            ->with('pesan', 'Data berhasil disimpan');

    }
    public function destroy(Author $Author)
    {
        $Author->delete();

        return redirect()
            ->route('author.index')
            ->with('pesan', 'Data berhasil dihapus');
    }
}
