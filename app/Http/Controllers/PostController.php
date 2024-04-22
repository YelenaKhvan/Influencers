<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function posts(Request $request)
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(3);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id)->load('comments');
    
        return view('posts.show', [
            'post' => $post,
        ]);
    }
    
    
}
