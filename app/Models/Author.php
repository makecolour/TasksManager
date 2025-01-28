<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = ['bio'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'author_n_book');
    }
}
