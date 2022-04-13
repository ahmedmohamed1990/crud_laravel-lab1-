<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts = [
        ['id' => 0, 'title' => 'mvc', 'describtion'=>'way to code','posted_by' => 'ahmed', 'created_at' => '2022-04-11'],
        ['id' => 1, 'title' => 'oop', 'describtion'=>'oop is opject oriented programing','posted_by' => 'mohamed', 'created_at' => '2022-04-11'],
    ];
    public function index()
    {
        //dd($this->posts);
        return View('posts.index',['allposts'=>$this->posts]);
     
    }
    public function create(){
        // $this->posts.array_push($user);
        return view('posts.create');
    }

    public function store()
    {
              $postData=request()->all();

        $post=[
            "id"=>count($this->posts),
            "title" => request()["title"],
            "describtion"=>request()["describtion"],
            "posted_by" => request()['postedby'],
            "created_at" => request()['createdat']
        ];


       array_push($this->posts,$post);

       

         return view('posts.index',['allposts' => $this->posts]);
    }

    public function show($id)
    {
        $post=$this->posts[$id];
        // dd($post);
        return view('posts.show',['post'=>$post]);
    }
    public function edit($id){
        $post=$this->posts[$id];
        return view('posts.edit',['post'=>$post]);
    }
    public function update($id,Request $request)
    {
        $post=$request->all();
        
    
        

        $this->posts[$id]=$post;
        

        return view('posts.index',['allposts' => $this->posts]);
    }

public function destroy($id)
{
    
    unset($this-> posts[$id]);
    return view ('posts.index',['allposts'=>$this-> posts ]);
}
}
