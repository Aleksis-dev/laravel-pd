<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('books.index', ['books' => $books]);
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string',
            'released_at' => 'required|date',
        ]);

        $book = Book::create($data);

        return redirect()->route('book.show', $book)->with('status', 'Book created successfully.');
    }

    public function show(Book $book) {
        return view('books.show', ['singleBook' => $book]);
    }

    public function edit(Book $book) {
        return view('books.edit', ['editBook' => $book]);
    }

    public function update(Request $request, Book $book) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string',
            'released_at' => 'required|date',
        ]);

        $book->update($data);

        return redirect()->route('book.show', $book)->with('status', 'Book updated successfully.');;
    }
    
    public function destroy(Book $book) {
        $book->delete();
        return redirect()->route('book.index')->with('status', 'Book deleted successfully.');
    }
}
