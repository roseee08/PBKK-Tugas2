<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function buku()
    {
        return view('buku.buku');
    }
}