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
   public function edit($id){
        
    $comment = Comment::where('id', $id)->first(); 
    
    return view('comments.editComment',  ['comment' => $comment]);
}


   public function update (Request $request, $id){
    $title = $request->title;
    $body = $request->body;
   

    $comment = Comment::find($id);
    $postID = $comment->post_id;
    $comment->title= $title;
    $comment->body= $body;

    
     
    $comment->save();
    $post = Post::where('id', $postID)->first();
    return to_route('posts.show' , ['post'=>$post]);
  
 }

 public function destroy ($id){
    $comment = Comment::find($id);
    $postID = $comment->post_id;
    $comment->delete();
    $post = Post::where('id', $postID)->first();

    return to_route('posts.show' , ['post'=>$post]);

 }
}


