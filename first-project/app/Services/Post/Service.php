<?php

namespace App\Services\Post;

use App\Post;

class Service
{
    public function store($data)
    {
        Post::create($data);
    }

    public function update($post, $data)
    {
        $post->update($data);
    }
}
