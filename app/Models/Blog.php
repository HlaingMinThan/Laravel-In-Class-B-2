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
        $blogs = collect(File::files(resource_path('/blogs')))->map(function ($file) {
            $content = $file->getContents(); //string
            $yamlObj = YamlFrontMatter::parse($content);
            $filename = $file->getFilename();
            $filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);

            return new Blog($yamlObj->title, $yamlObj->intro, $yamlObj->body(),  $filenameWithoutExtension);
        });
        return $blogs;
    }

    public static function find($filename)
    {
        return static::all()->firstWhere('filename', $filename);
    }

    public static function findOrFail($filename)
    {
        $blog = static::find($filename);
        if (!$blog) {
            abort(404);
        }
        return $blog;
    }
}
