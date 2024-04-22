<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function show($id)
    {
        $comment = Comment::findOrFail($id);

        return view('posts.show', [
            'comment' => $comment,
        ]);
    }


    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
    
        $comment = new Comment();
        $comment->text = $request->input('comment');
        $comment->user_id = Auth::id(); // Используем ID аутентифицированного пользователя
        $post->comments()->save($comment);
    
        return redirect()->back()->with('success', 'Комментарий успешно добавлен');
    }

}
