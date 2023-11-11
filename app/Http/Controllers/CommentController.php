<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function post(Request $request)
    {
        $comment = new Comment();
        $comment->news_id = $request->input('newsId');
        $comment->user_id = $request->user()->id;
        $comment->content = $request->input('comment');
        $comment->save();

        return redirect()->route('wakeup.get.id', ['id' => $comment->news_id]);
    }
}
