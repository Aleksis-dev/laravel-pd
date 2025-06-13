<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books', [BookController::class, 'store'])->name('book.store');
Route::get('/books/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/books/{book}/update', [BookController::class, 'update'])->name('book.update');
Route::delete('/books/{book}/delete', [BookController::class, 'destroy'])->name('book.destroy');
