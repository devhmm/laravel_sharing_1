<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use App\Post;
use App\Comment;
Route::get('/', function () {  
    
    
    // Existence
    $posts = Post::has('postComments',function ($query) {
        $query->where('description', 'Comment 1');
    })->get();
    dd($posts);
    $user = User::find(4);
    $roles = $user->userRoles;
    dd($roles);
    $user = new User;
    $user->name = "New User 1";
    $user->email = "dd@gmail.com";
    $user->save();
    $user_id = $user->id;
    $role_id = 1;
    $user->userRoles()->attach($role_id);

    dd('fdsfa');
    $phone = $user->userPhone;
    $post = Post::find(1);
    $comments = $post->postComments()->with('commentPost')->get();
    dd($comments);
    return view('welcome')->with('comments',$comments);
   
});


