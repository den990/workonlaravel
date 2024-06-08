<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function index() {
        $post = Post::all();
        dd($post);
    }

    public function create()
    {

    }
}
