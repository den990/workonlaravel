<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('post.create');
    }
}
