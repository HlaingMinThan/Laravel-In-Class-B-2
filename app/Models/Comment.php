<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'blog_id'];

    // a comment belongsto a blog 
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    // a comment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
