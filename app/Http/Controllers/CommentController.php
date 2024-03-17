<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body' => ['required', 'min:5']
        ]);

        $blog->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return back();
    }
}
