<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{
    //
    
    public function store (Request $request, $id){
      
        $title = $request->title;
        $commentBody = $request->body;
        $postID = $id;

       Comment::create([
           'title' => $title,
           'body' => $commentBody,
           'post_id' => $postID,
       ]);

       $post = Post::where('id', $id)->first();
        return to_route('posts.show', ['post'=>$post]);
   }
}


