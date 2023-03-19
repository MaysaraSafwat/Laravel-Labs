<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
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
Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
Route::get('/update/{post}', [PostsController::class, 'updateForm'])->name('posts.updateForm');
Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
Route::put('/update/{post}', [PostsController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostsController::class, 'delete'])->name('posts.delete');
