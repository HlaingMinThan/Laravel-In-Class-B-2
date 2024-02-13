<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    $blogs = Blog::all();
    return view('home', compact('blogs'));
});

Route::get("/blogs/{slug}", function ($slug) {
    $blog = Blog::where('slug', $slug)->first();
    return view('blog-detail', compact('blog'));
});

//update /blogs/1 -> blog id 1's title should be 'updated title'
//delete /blogs/1  -> blog id 1's should be deleted.
