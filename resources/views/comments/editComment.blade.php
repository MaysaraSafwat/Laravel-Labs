@extends('layouts.app')


@section('title') Update Post @endsection

@section('content')
<form method="post" action="{{route('comments.update', $comment->id)}}">
{{ csrf_field() }} 
@method('put')

  <div class="form-group">
    <label for="exampleFormControlInput1">comment Title</label>
    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$comment->title}}">
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">comment body</label>
    <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{$comment->body}}"></textarea>
  </div>


  <button class="btn btn-success" type="submit">update</button>
</form>



@endsection