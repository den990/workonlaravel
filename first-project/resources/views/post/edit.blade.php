@extends('layouts.app')
@section('title','Posts View')
@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="tittle" class="form-label">Tittle</label>
            <input type="text" name="tittle" class="form-control" id="tittle" placeholder="Tittle" value="{{$post->tittle}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="Content">{{$post->content}} </textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{ $post->image }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
