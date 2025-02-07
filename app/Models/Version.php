<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $table = 'versions';
    protected $fillable = ['format'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function bookType()
    {
        return $this->belongsTo(BookType::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
