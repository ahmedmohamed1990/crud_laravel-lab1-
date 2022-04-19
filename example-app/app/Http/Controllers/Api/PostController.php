<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        $posts =  Post::all();
        return PostResource::collection($posts);
        // return new PostResource($posts);

    }

    public function show($postId)
    {
        $post =  Post::find($postId);
        return new PostResource($post);
    }
    
    public function store(StoreRequest $request)
    {
        // if(request()->header('Accept') && request()->header('Accept') == 'application/pdf') {
        //     return ' some pdf';
        // }

        $data = $request->all();

        //store the request data in the db
        $post = Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);

        return $post;
         // return new PostResource($post);
    }
}
