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

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
