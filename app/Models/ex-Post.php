<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $body;
    public $date;
    public $slug;
    public function __construct($title, $excerpt, $body, $slug, $date)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->slug = $slug;
        $this->date = $date;
    }

    public static function all()
    {
        return Cache::rememberForever("post-all", function () {
            return collect(File::files(resource_path("/posts")))
                ->map(fn($post) => YamlFrontMatter::parseFile($post))
                ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->body(),
                    $document->slug,
                    $document->date,
                ))->sortByDesc("date");
        }
        );
    }
    public static function find($slug)
    {
        //Get the the posts
        $post = static::all();
        //loo through all the posts and find the mathced key value pair
        return ($post->firstWhere('slug', $slug));
    }
    public static function findOrFail($slug)
    {
        $post = static::find($slug);
        if (!$post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}
