<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ITI Blog Post</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="#">All Posts</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="text-center">
        <button type="button" class="mt-4 btn btn-success">Create Post</button>
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
      
        @foreach($posts as $post)
            <tr>
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['posted_by']}}</td>
                <td>{{$post['created_at']}}</td>
                <td>
                    <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach




        </tbody>
    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html> -->

@extends('layouts.app')


@section('title') Index @endsection

@section('content')
    <div class="text-center">
        <button type="button" class="mt-4 btn btn-success"><a style="text-decoration:none; color:white;" href="{{route('posts.create')}}">Create Post</a></button>
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

        @foreach($posts as $post)
      
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                @if($post->user)
                <td>{{$post->user->name}}</td>
                @else
                <td>Not Found</td>
                @endif
                <td>{{$post->created_at}}</td>
                <td>
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.updateForm', $post->id)}}" class="btn btn-primary">Edit</a>
                    <!-- <form method="post" action="{{route('posts.delete', $post['id'])}}">
                    {{ csrf_field() }} 
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form> -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$post->id}}" data-bs-whatever="@mdo">Delete</button>
                    <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Warning </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       Are u sure you want to delete?
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="{{route('posts.delete', $post->id)}}">
                        {{ csrf_field() }} 
                         @method('delete')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                    </div>
                </div>
                </div>
                </td>
            </tr>
        @endforeach



        </tbody>
    </table>

@endsection
