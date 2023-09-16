<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function __invoke()
    {
        $posts = Post::with('images')->paginate(15);
        return view('posts.index', compact('posts'));
    }
}
