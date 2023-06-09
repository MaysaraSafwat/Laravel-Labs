@extends('layouts.app')


@section('title') Create Post @endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
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
    <label for="formFile" class="form-label">Upload Image</label>
    <input class="form-control" name="image" type="file" id="formFile">
  </div>

  <div class="form-group">
  <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
  </div>

  <button class="btn btn-success" type="submit">Create</button>
</form>



@endsection