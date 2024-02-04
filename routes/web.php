<?php

use App\Models\Blog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

//http://127.0.0.1:8000
Route::get('/', function () {
    $blogs = Blog::all();
    $title = "My blog website";
    return view('home', compact('blogs', 'title'));
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
