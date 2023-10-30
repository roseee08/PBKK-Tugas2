<?php

use App\Http\Controllers\AuthorController;
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

//Route::get('/', function () {
//  return view('welcome');
//});

Route::get('/siswa', [SiswaController::class, "siswa"]);
Route::get('/buku', [BukuController::class, "buku"]);

Route::get('/author',[AuthorController::class, 'index'])->name('author.index');
Route::get('/author/create',[AuthorController::class,'create'])->name('author.create');
Route::post('/author', [AuthorController::class, 'store'])->name('author.store');

Route::get('/author/{author}', [AuthorController::class, 'show'])->name('author.show');
Route::get('/author/{author}/edit', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('/author/{author}', [AuthorController::class, 'update'])->name('author.update');
Route::delete('/author{author}', [AuthorController::class,'destroy'])->name('author.destroy');
// Route::resource('author', [AuthorController::class]);