<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\SiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/siswa', [SiswaController::class, "siswa"]);
Route::get('/buku', [BukuController::class, "buku"]);

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

Route::get('/author',[AuthorController::class, 'index'])->name('author.index');
Route::get('/author/create',[AuthorController::class,'create'])->name('author.create');
Route::post('/author', [AuthorController::class, 'store'])->name('author.store');

Route::get('/author/{author}', [AuthorController::class, 'show'])->name('author.show');
Route::get('/author/{author}/edit', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('/author/{author}', [AuthorController::class, 'update'])->name('author.update');
Route::delete('/author{author}', [AuthorController::class,'destroy'])->name('author.destroy');
// Route::resource('author', [AuthorController::class]);

Route::get('/', function () {
    return view('contoh.halaman-a');
 });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/layouts', function () {
        return view('layouts.plain-admin');
    });  

require __DIR__.'/auth.php';

//Route::middleware('auth')->group(function(){
    //Route::get('/halaman-a', function () {
        //return view('contoh.halaman-a');
    //});
    
    //Route::get('/halaman-b', function () {
        //return view('contoh.halaman-b');
    //});    
//});


//Route::middleware('role:admin')->group(function () {
    //semua route untuk admin disini
//});

//Route::middleware('role:user')->group(function () {
    //semua route untuk user disini
//});

//Route::middleware('role:petugas')->group(function () {
    //semua route untuk petugas disini
//});