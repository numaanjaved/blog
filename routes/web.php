<?php


use Illuminate\Support\Facades\Route;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

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

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->get()
    ]);
});
Route::get('posts/{post:slug}', function(Post $post){
    // find a post by its slug and pass it to view post
    
    return view('post', [
        'post' => $post
    ]);
});
   
Route::get('categories/{category}', function(Category $category){
    // find a post by its slug and pass it to view post
    
    return view('posts', [
        'posts' => $category->posts
    ]);
});
Route::get('users/{user:username}', function(User $user){
    // find a post by its slug and pass it to view post
    return view('posts', [
        'posts' => $user->posts
    ]);
});