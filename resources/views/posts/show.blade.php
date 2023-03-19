@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-6">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post['title']}}</h5>
            <p class="card-text">Description: {{$post['description']}}</p>
        </div>
    </div>

    <div class="card mt-6">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>

    <!-- -----------COMMENT SECTION------------- -->

    <section style="background-color: #eee;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card" style="padding: 5% 2%; height: fit-content;">
          <div class="card-body">

            <div>
              @foreach($comments as $comment)
              <div>
              <div>
                <h6 class="fw-bold text-primary mb-1">{{$comment->title}}</h6>
                <p class="text-muted small mb-0">
                  Shared publicly -{{$comment->created_at}}
                </p>
              </div>

            <p class="mt-3 mb-4 pb-2">
             {{$comment->body}}
            </p> 

            <div class="small d-flex justify-content-start g-5">
                <form method="GET" action="{{route('comments.edit', $comment->id)}}">
                    <button type="submit" class="btn btn-success" >update</button>
                </form>
                
           
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalDelete{{$comment->id}}" data-bs-whatever="@mdo">Delete</button>
                   <!-- DELETE MODAL -->
                   <div class="modal fade" id="exampleModalDelete{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Warning </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       Are u sure you want to delete this comment?
                    </div>
                    <div class="modal-footer">
                        <form method="post" action="{{route('comments.delete', $comment->id)}}">
                        {{ csrf_field() }} 
                         @method('delete')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                    </div>
                </div>
                </div>
                   <!-- END OF DELETE MODAL -->
           </div>
        </div>
           
           @endforeach
           
          </div>

          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            
          <form method="post" action="{{route('comments.store', $post->id)}}">
            {{ csrf_field() }} 

            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$post->title}}">
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comment</label>
                <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{$post->description}}"></textarea>
            </div>


            <button class="btn btn-success" type="submit">Comment</button>
            </form>
        
          </div>

        </div>
      </div>
    </div>
  </div>
</section>




    <!-- ---------------END OF COMMENTS -------------------->








@endsection