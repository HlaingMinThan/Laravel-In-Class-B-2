<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'intro', 'body'];
    // a blog belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //a blog belongs to a user
    public function author() //author -> author_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query)
    {
        if ($search = request('search')) {
            $query->where(function ($blogQuery) use ($search) {
                $blogQuery->where('title', 'LIKE', '%' .  $search . '%')
                    ->orWhere('body', "LIKE", '%' . $search . '%');
            });
        }
        if ($slug = request('category')) {
            $query->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        }
        if ($username = request('author')) {
            $query->whereHas('author', function ($query) use ($username) {
                $query->where('username', $username);
            });
        }
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
