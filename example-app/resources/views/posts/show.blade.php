@extends('layout.app')

@section('title') This Is Index Page @endsection

@section('content')
<div class="card">
  <div class="card-header">
    post info
  </div>
  <div class="card-body">
    <h5 class="card-title" > Title:- {{$post['title']}}</h5>
    <h5 class="card-title" > Description:- {{$post['description']}}</h5>
    
  </div>
</div>
<div class="card">
  <div class="card-header">
    info of create
  </div>
  <div class="card-body ">
        <h5 class="card-title fs-4">
            <span class="fw-bold">Name:</span>
            <p class="d-inline-block card-text text-muted">
                {{$post->user ? $post->user->name : 'Not Found'}}
            </p>
        </h5>
        <h5 class="card-title fs-4">
            <span class="fw-bold">Email:</span>
            <p class="d-inline-block card-text text-muted">
                {{$post->user ? $post->user->email : 'Not Found'}}
            </p>
        </h5>
        <h5 class="card-title fs-4">
            <span class="fw-bold">Created At:</span>
            <p class="d-inline-block card-text text-muted">
            {{$post->created_at->format('l jS \of F Y h:i:s A')}}
            </p>
        </h5>
</div>

<div class="card my-4">
    <div class="card-header fw-bold fs-1">
        Comments
    </div>
    <div class="card-body ">
        @if(isset($post->comments) && count($post->comments) > 0)
            @foreach ($post->comments as $comment)
                <div class='my-4 border p-4 rounded-lg'>
                    <h2 class='text-lg fw-bold'>{{$comment->user->name}}</h2>
                    <p class='text-lg my-2 fs-2'>{{$comment->body}}</p>
                    <span class='text-sm'>Last Updated At: {{$comment->updated_at->toDayDateTimeString()}}</span>
                    <div class="mt-4  flex">
                        <form class="text-center d-inline" method='POST' action="{{route('comments.delete', ['postId' => $post['id'], 'commentId' => $comment->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="sumbit" class='btn btn-lg btn-primary'>Delete</button>
                        </form>
                        <a class='btn btn-lg btn-success ml-4' href="{{route('comments.view', ['postId' => $post['id'], 'commentId' => $comment->id])}}">
                            Edit
                        </a>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>

<div class="d-flex justify-content-center " style="width: 100%">
    <form action="{{route('comments.create',['postId' => $post['id']])}}" method="POST" style="width: 100%">
        <input type="text" name="comment" class="form-control mr-2" placeholder="Add comment" style="margin: 10px 0;">

        @csrf
        <button type="submit" class="btn btn-success">Add Comment</button>
    </form>
</div>
@endsection