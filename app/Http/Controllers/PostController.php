<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show($slug, Post $post)
    {
        $post = $post->where('slug', $slug)->firstOrFail();
        
        return view('post', compact('post'));
    }
}
