<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    $blogs = Blog::all();
    return view('home', compact('blogs'));
});

Route::get("/blogs/{filename}", function ($filename) {
    $blog = Blog::findOrFail($filename);
    return view('blog-detail', compact('blog'));
});
