<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    protected $fillable = ['name', 'description'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_n_genre');
    }
}
