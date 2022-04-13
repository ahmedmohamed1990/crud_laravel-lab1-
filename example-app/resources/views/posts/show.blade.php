@extends('layout.app')

@section('title') This Is Index Page @endsection

@section('content')
<div class="card">
  <div class="card-header">
    post info
  </div>
  <div class="card-body">
    <h5 class="card-title" > Title:- {{$post['title']}}</h5>
    <h5 class="card-title" > Description:- {{$post['describtion']}}</h5>
    
  </div>
</div>
<div class="card">
  <div class="card-header">
    info of create
  </div>
  <div class="card-body">
    <h5 class="card-title" > name:- {{$post['posted_by']}}</h5>
    <h5 class="card-title"> Creatorat:- {{$post['created_at']}}</h5>
    
  </div>
</div>
@endsection