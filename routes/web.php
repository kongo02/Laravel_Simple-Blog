<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    //$posts = Post::all();
    //$posts = Post::where('user_id', auth()->id())->get();
    $posts = [];
    if(auth()->check()){
        $posts = auth()->user()->userPost()->latest()->get();
    }
   
    return view('home',['posts'=> $posts]);
});
Route::post('/register', [UserController::class,'register']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/login', [UserController::class,'login']);

// Blog Post
Route::post('/create-post',[PostController::class,'createPost']);
Route::get('/edit-post/{post}', [PostController::class,'editPost']);
Route::put('/edit-post/{post}', [PostController::class,'update']);
Route::delete('/edit-post/{post}', [PostController::class,'delete']);