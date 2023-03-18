<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view("index", [
            'header' => "All blogs",
            'posts' => $posts,
        ]);
    }
    public function show(Post $post)
    {
        return view("post", [
            'post' => $post,
        ]);
    }
}

