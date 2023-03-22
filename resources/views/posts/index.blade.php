
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
            <th scope="col">Slug-form</th>
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
                @if($post->slug)
                <td>{{$post->slug}}</td>
                @else
                <td>Not found</td>
                @endif
                
                @if($post->user)
                <td>{{$post->user->name}}</td>
                @else
                <td>Not Found</td>
                @endif
                <td>{{\Carbon\Carbon::parse($post->created_at)->format('Y-m-d');}}</td>
                <td>
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.updateForm', $post->id)}}" class="btn btn-primary">Edit</a>
                   
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$post->id}}" data-bs-whatever="@mdo">Delete</button>
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
     <div class="container">
     {{$posts->links('pagination::bootstrap-4')}}
    </div> 
@endsection
