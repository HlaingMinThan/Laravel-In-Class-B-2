<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public function __construct(public $title, public $intro, public $body, public $filename)
    {
    }

    public static function all()
    {
        $blogs = [];
        $blogs =  array_map(function ($file) {
            $content = $file->getContents(); //string
            $yamlObj = YamlFrontMatter::parse($content);
            $filename = $file->getFilename();
            $filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);

            return new Blog($yamlObj->title, $yamlObj->intro, $yamlObj->body(),  $filenameWithoutExtension);
        }, File::files(resource_path('/blogs'))); //[obj,obj]
        return $blogs;
    }

    public static function find($filename)
    {
        //handle file not exists -> 404 or redirect to home page
        $path = resource_path('/blogs/' . $filename . '.html');
        if (!file_exists($path)) {
            // abort(404);
            return redirect('/');
        }

        $content = file_get_contents($path);
        $yamlObj = YamlFrontMatter::parse($content);

        $blog = new Blog($yamlObj->title, $yamlObj->intro, $yamlObj->body(), $filename);
        return $blog;
    }
}
