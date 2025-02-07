<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Version;

class VersionController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'format' => 'required|string|max:255',
        ]);

        $version = new Version();
        $version->format = $request->input('format');
        $version->book_id = $book->id;
        $version->save();

        return response()->json(['message' => 'Version inserted successfully', 'version' => $version], 201);
    }
}
