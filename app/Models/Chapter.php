<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapters';
    protected $fillable = ['title', 'number', 'content'];

    public function version()
    {
        return $this->belongsTo(Version::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
