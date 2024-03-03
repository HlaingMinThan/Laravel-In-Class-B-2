<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        //dynamic query -> multiple filter
        $blogs = Blog::with('category', 'author')->filter()->latest()->paginate(3);
        return view('home', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        return view('blog-detail', compact('blog'));
    }
}
