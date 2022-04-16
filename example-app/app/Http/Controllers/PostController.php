<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);



       return view('posts.index',['allPosts'=>$posts]);


    }

    public function create()
    {
        $users = User::all();

        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store()
    {
        $data = request()->all();

        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],

        ]);

        return redirect()->route('posts.index');;
    }





    public function show($post)
    {

         $Posts = Post::find($post);


        return view('posts.show',[
            'post'=>$Posts,
        ]);
    }

    public function edit($post){
        $editPosts =post::findOrFail($post);
        $users=User::all();


        return view('posts.edit',['post'=>$editPosts,'users'=>$users]);
    }

    public function update($post,Request $request){


        $updatePosts=post::findOrFail($post);
        $updatePosts->update([
            'title'=>$request->title,
            'descraption'=>$request->descraption,
            'user_id'=>$request->post_creator,

        ]);
        return redirect()->route('posts.index');
    }


    public function destroy ($post){
    $deletePosts =post::findOrFail($post);
    $deletePosts->delete();
    return redirect()->route('posts.index');

       }
}