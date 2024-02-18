<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    $blogs = Blog::all();
    return view('home', compact('blogs'));
});

Route::get("/blogs/{blog:slug}", function (Blog $blog) {
    return view('blog-detail', compact('blog'));
});

Route::get("/categories/{category:slug}", function (Category $category) {
    $blogs = $category->blogs;
    return view('home', compact('blogs'));
});
Route::get("/users/{user}", function (User $user) {
    $blogs = $user->blogs;
    return view('home', compact('blogs'));
});

//update /blogs/1 -> blog id 1's title should be 'updated title'
//delete /blogs/1  -> blog id 1's should be deleted.
