@extends('layout.app')

@section('title') This Is Index Page @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
        </div>
        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            
            @foreach ( $allposts as  $index=>$post);
              <tr>
                <td>{{$index}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['describtion']}}</td>
                <td>{{$post['posted_by']}}</td>
                
                <td>
                    <a href="{{route('posts.show', ['post' => $index])}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit', ['post' => $index])}}" class="btn btn-primary">Edit</a>
                    <form style="display: inline;" method="post" action="{{route('posts.destroy',['post'=>$index])}}">
                  @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure, you want Delete this row?')" class="btn btn-danger">Delete</button>
</form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
@endsection