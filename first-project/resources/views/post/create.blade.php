@extends('layouts.app')
@section('title','Posts View')
@section('content')
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="tittle" class="form-label">Tittle</label>
            <input type="text" name="tittle" class="form-control" id="tittle" placeholder="Tittle">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" placeholder="Content"> </textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="Image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
