<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware'=>['auth']],function(){
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
    Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
    Route::get('/update/{post}', [PostsController::class, 'updateForm'])->name('posts.updateForm');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::put('/update/{post}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostsController::class, 'delete'])->name('posts.delete');
    
    Route::post('/comments/{post}', [CommentsController::class, 'store'])->name('comments.store');
    Route::get('/comments/{post}/editForm', [CommentsController::class,"edit"])->name("comments.edit");
    Route::put('/comments/{post}', [CommentsController::class,"update"])->name("comments.update");
    Route::delete('/comments/{post}', [CommentsController::class,"destroy"])->name("comments.delete");
  
  
  });




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
