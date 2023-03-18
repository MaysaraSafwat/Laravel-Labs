@extends('layouts.app')


@section('title') Update Post @endsection

@section('content')
<form method="post" action="{{route('posts.update', $post['id'])}}">
{{ csrf_field() }} 
@method('put')

  <div class="form-group">
    <label for="exampleFormControlInput1">Post Title</label>
    <input name="email" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$post['title']}}">
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Post</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{$post['description']}}"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Post Creator</label>
    <input name="creator" type="text" class="form-control" id="exampleFormControlInput2" placeholder="" value="{{$post['posted_by']}}">
  </div>

  <button class="btn btn-success" type="submit">update</button>
</form>



@endsection