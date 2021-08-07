<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'author'])->latest()->get();
        return view('posts', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('post', compact('post'));
    }
}
