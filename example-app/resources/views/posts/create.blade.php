@extends('layout.app')
@section('title') create post @endsection

@section('content')
        <form class="col-6 mx-auto my-5" method="POST" action="{{route('posts.store')}}"> 
            @csrf
            <div class="mb-3">
              <label for="exampleInputTitle" class="form-label">Title</label>
              <input name="title" type="text" class="form-control" id="exampleInputTitle" >
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"  rows="3"></textarea>
          </div>


          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
            <select name='post_creator' class="form-control">
              @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>
       </div>


             
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

          
          @endsection