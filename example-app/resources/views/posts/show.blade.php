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
                {{$post['created_at']->toDayDateTimeString()}}
            </p>
        </h5>
</div>
@endsection