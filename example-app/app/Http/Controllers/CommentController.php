<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function create($postId)
    {
        {
            $post = Post::findOrFail($postId);
            // dd($post->Comments());
            $req = request();

            if ($req->comment) {
                $post->Comments()->create([
                    'user_id' => 1,
                    'body' => $req->comment,
                    'commentable_id' => (int)$postId,
                    'commentable_type' => Post::class,
                ]);
            }

            return redirect('posts/' . $postId);
        }
    }

    public function delete($postId, $commentId)
    {
        Comment::where('id', $commentId)->delete();
        return redirect('posts/' . $postId);
    }
    public function view($postId, $commentId)
    {
        $post = Post::findOrFail($postId);
        $comment = Comment::where('id', $commentId)->first();
        return view('comments.edit', ['post' => $post, 'comment' => $comment]);
    }
    public function edit($postId, $commentId)
    {
        // $post = Post::find($postId);
        $req = request();
        Comment::where('id', $commentId)->first()->update([
            'body' => $req->comment
        ]);
        return redirect('posts/' . $postId);
    }
}
