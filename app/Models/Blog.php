<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Blog
{
    public static function all()
    {
        $blogs = array_map(function ($file) {
            return $file->getContents();
        }, File::files(resource_path('/blogs'))); // [string,string]

        return $blogs;
    }
}


//Blog::all()