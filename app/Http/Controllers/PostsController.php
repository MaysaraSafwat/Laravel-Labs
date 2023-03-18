<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Ramsey\Uuid\v1;

class PostsController extends Controller{

     public $allPosts = [
        [
            'id' => 1,
            'title' => 'Laravel',
            'posted_by' => 'Ahmed',
            'created_at' => '2022-08-01 10:00:00'
        ],

        [
            'id' => 2,
            'title' => 'PHP',
            'posted_by' => 'Mohamed',
            'created_at' => '2022-08-01 10:00:00'
        ],

        [
            'id' => 3,
            'title' => 'Javascript',
            'posted_by' => 'Ali',
            'created_at' => '2022-08-01 10:00:00'
        ],
    ];
    public function index()
    {

        return view('posts.index', ['posts' => $this->allPosts]);
    }


    
    public function show($id)
    {

        $post =  [
            'id' => 1,
            'title' => 'Laravel',
            'posted_by' => 'Ahmed',
            'created_at' => '2022-08-01 10:00:00',
            'description'=> "blah blah blah blah"
        ];


        return view('posts.show', ['post' => $post]);
    }

    public function create (Request $request){
        
        return view('posts.create');
    }
    public function updateForm ($id){
        
        $post =  [
            'id' => 1,
            'title' => 'Laravel',
            'posted_by' => 'Ahmed',
            'created_at' => '2022-08-01 10:00:00',
            'description'=> "blah blah blah blah"
        ];

        
        return view('posts.updateForm',  ['post' => $post]);
    }

    public function store (Request $request){

       return redirect()->route('posts.store');
       
    }

    public function update (Request $request){
        return redirect()->route('posts.store');
        
     }
}
