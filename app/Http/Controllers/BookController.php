<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Log;

class BookController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'published_date' => 'date',
            'description' => 'nullable|string',
            'isbn' => 'string|max:13',
        ]);

        $book = new Book();
        $book->title = $request->input('title');
        $book->published_date = $request->input('published_date');
        $book->description = $request->input('description');
        $book->isbn = $request->input('isbn');
        $book->save();

        return response()->json(['message' => 'Book inserted successfully', 'book' => $book], 201);
    }
}
