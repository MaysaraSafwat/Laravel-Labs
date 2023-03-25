<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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



 
Route::get('/auth/redirect', function () {

    return Socialite::driver('github')->redirect();
})->name('login.github');
 
Route::get('/auth/callback', function () {
  $githubUser = Socialite::driver('github')->user();
  $user = User::updateOrCreate([
      'github_id' => $githubUser->id,
  ], [
      'id' => $githubUser->id,
      'name' => $githubUser->nickname,
      'email' => $githubUser->email,
      'password'=>"789456123",
      'github_token' => $githubUser->token,
      'github_refresh_token' => $githubUser->refreshToken,
  ]);

  Auth::login($user);


 dd($user);


});
