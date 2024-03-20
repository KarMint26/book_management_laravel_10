<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BookController::class, 'index'])->name('book.index');
Route::get('/book/add', [BookController::class, 'create'])->name('book.create');
Route::post('/book/add/create', [BookController::class, 'store'])->name('book.store');
Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/{book}/delete', [BookController::class, 'destroy'])->name('book.destroy');
