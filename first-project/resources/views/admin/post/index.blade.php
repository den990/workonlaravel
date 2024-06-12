@extends('layouts.admin')
@section('title','Posts View')
@section('content')
    <div>
        <a class="btn btn-primary mb-2" href="{{ route('post.create') }}">Add one</a>
        @foreach($posts as $post)
            <div>
                <a href="{{ route('post.show', $post->id) }}"> {{$post->id}}. {{$post->tittle}} </a>
            </div>
        @endforeach
    </div>
@endsection
