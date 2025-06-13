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
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string',
            'released_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048'
        ]);

        $book = Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'released_at' => $request->input('released_at'),
            'image' => null
        ]);

        if ($request->file('image')) {
            $imagePath = $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('images', $book->id . '.' . $imagePath, 'public');
            $book->update(['image' => $path]);
        }

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
