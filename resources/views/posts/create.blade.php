@extends('layouts.app')


@section('title') Create Post @endsection

@section('content')
<form method="post" action="{{route('posts.store')}}">
{{ csrf_field() }} 

  <div class="form-group">
    <label for="exampleFormControlInput1">Post Title</label>
    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Post</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Post Creator</label>
    <input name="creator" type="text" class="form-control" id="exampleFormControlInput2" placeholder="">
  </div>

  <button class="btn btn-success" type="submit">Create</button>
</form>



@endsection