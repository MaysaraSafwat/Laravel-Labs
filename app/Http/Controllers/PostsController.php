<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Ramsey\Uuid\v1;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller{
   //get all posts
    public function index()
    {
        //  $allPosts = Post::all(); //select * from posts
        //  //dd($allPosts);

        // return view('posts.index', ['posts' => $allPosts]);
        $paginatedPosts = Post::paginate(5);
        return view('posts.index', ['posts' => $paginatedPosts]);
       
    }

   //get post by id
    
    public function show($id)
    {

    $post = Post::where('id', $id)->first(); //Post model object ... select * from posts where id = 1 limit 1;
    return view('posts.show', ['post' => $post]);
    }

    //passing user data to create post form
    public function create (Request $request){
        
      $users = User::all();
       return view('posts.create', ['users' => $users]);
    }

    //passing user to be updated
    public function updateForm ($id){
        
        $post = Post::where('id', $id)->first(); 
        
        return view('posts.updateForm',  ['post' => $post]);
    }
    // create new post record add to database
    public function store (Request $request){
      
         $title = $request->title;
         $description = $request->description;
         $postCreator = $request->post_creator;

         Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);

         return to_route('posts.index');
    }

    //update record
     public function update (Request $request, $id){
        $title = $request->title;
        $description = $request->description;

        $post = Post::find($id);
 
        $post->title= $title;
        $post->description = $description;
         
        $post->save();
        return to_route('posts.index');
     }
        
     public function delete ($id){
        $post = Post::find($id);
        $post->delete();

        return to_route('posts.index');

     }
         
     
}
