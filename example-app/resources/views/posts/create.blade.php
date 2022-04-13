@extends('layout.app')

        <form class="col-6 mx-auto my-5" method="POST" action="{{route('posts.store')}}"> 
            @csrf
            <div class="mb-3">
              <label for="exampleInputTitle" class="form-label">Title</label>
              <input name="title" type="text" class="form-control" id="exampleInputTitle" >
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="describtion" id="exampleFormControlTextarea1"  rows="3"></textarea>
          </div>


            <div class="mb-3">
                <label for="exampleInputPosted" class="form-label">Posted By</label>
                <input name="posted_by" type="text" class="form-control" id="exampleInputPosted">
              </div>

              <div class="mb-3">
                <label for="exampleInputDate" class="form-label">Created At</label>
                <input name="created_at" type="date" class="form-control"  id="exampleInputDate">
              </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>