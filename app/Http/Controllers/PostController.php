<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;

final class PostController
{
    public function show($slug, Post $post)
    {
        $post = $post->published()->where('slug', $slug)->firstOrFail();

        return view('post', compact('post'));
    }
}
