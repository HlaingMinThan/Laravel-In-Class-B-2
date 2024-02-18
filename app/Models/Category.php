<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //  a category hasmany blogs
    public function blogs()
    {
        return $this->hasmany(Blog::class, 'category_id');
    }
}
