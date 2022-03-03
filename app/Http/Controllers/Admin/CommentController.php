<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function update(Request $request, Comment $comment)
    {
        $comment->approved = 1;
        $comment->save();

        return redirect()->route('posts.show', $comment->post_id . '/#comments');
    }

    public function destroy(Comment $comment)
    {
        $id = $comment->post_id;
        $comment->delete();

        return redirect()->route('posts.show', $id . '/#comments');
    }
}
