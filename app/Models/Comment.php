<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['content', 'attachment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function version()
    {
        return $this->belongsTo(Version::class, 'version_id');
    }

    public function replyTo()
    {
        return $this->belongsTo(Comment::class, 'reply_to');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'reply_to');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'reply_to');
    }

    public function children()
    {
        return $this->hasMany(Comment::class, 'reply_to');
    }

    public function scopeParent($query)
    {
        return $query->whereNull('reply_to');
    }

    public function scopeChildren($query)
    {
        return $query->whereNotNull('reply_to');
    }

}
