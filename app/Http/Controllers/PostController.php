<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        // return Post::latest()->filter(request(['search','category','user']))->paginate();
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search','category','user']))->paginate(5)->withQueryString(),

        ]);
    }
    public function show(Post $post){
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
