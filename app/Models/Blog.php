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
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
