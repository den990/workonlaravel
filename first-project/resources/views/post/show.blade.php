@extends('layouts.app')
@section('title','Posts View')
@section('content')
    <div>
        <div class="d-flex flex-row">
            <a class="btn btn-primary mb-2" href="{{ route('post.index') }}">Back</a>
            <a class="btn btn-success mb-2 ml-1" href="{{ route('post.edit', $post->id) }}">Update</a>

            <form action="{{ route('post.delete', $post->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger mb-2 ml-1" type="submit">Delete</button>
            </form>
        </div>
        <div>
            {{$post->tittle}} / {{ $post->content  }}
        </div>
    </div>
@endsection
