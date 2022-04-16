@extends('layout.app')

@section('title')edit @endsection

@section('content')
<form class="col-6 mx-auto my-5" method="POST" action="{{route('posts.update',['post' => $post['id']])}}"> 
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$post['title']}}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"  rows="3"> {{$post['description']}}</textarea>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1"  class="form-label">Post Creator</label>
            <select name='post_creator' class="form-control">
              @foreach ($users as $user)
                <option value="{{$user->id}}" @if($user->id == $post->user_id) selected @endif >{{$user->name}}</option>
              @endforeach
            </select>
       </div>

          <div class="mb-3">
                <button type="submit" class="btn btn-success">update Post</button>
          </div>
        </form>
@endsection