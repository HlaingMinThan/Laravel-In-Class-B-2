<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        //dynamic query -> multiple filter
        $blogs = Blog::with('category', 'author')->filter()->latest()->get();
        return view('home', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        return view('blog-detail', compact('blog'));
    }
}
