<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['title', 'published_date', 'description', 'isbn'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_n_book');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_n_genre');
    }

    public function versions()
    {
        return $this->hasMany(Version::class);
    }
}
