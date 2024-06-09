<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
           'tittle' => 'string',
           'content' => 'string',
           'image' => 'string'
        ]);
        Post::create($data);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'tittle' => 'string',
            'content' => 'string',
            'image' => 'string'
        ]);

        $post->update($data);

        return redirect()->route('post.show', $post->id);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
