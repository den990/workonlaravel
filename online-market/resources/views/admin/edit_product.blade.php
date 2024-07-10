@extends('admin.layouts.main')

@section('title', 'Edit Product')

@section('admin-content')
    <div class="col-6 mt-5 ms-2">
        <h3>Edit Product</h3>
        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group fw-semibold d-flex flex-column">
                <label for="img_id" class="col-md-4 col-form-label">{{ __('Logo Product') }}</label>
                <div class="col-md-6">
                    <input class="form-control @error('img_id') is-invalid @enderror" type="file"
                           id="img_id" name="img_id" autocomplete="img_id" autofocus
                           onchange="previewAvatar()">
                    @error('img_id')
                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                    @enderror
                    <div class="mt-2">
                        <img id="preview-avatar" class="img-thumbnail"
                             style="max-width: 150px; " src="{{$product->logo_path}}">
                    </div>
                </div>
            </div>
            <div class="form-group fw-semibold">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group fw-semibold">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>
            <div class="form-group fw-semibold">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Product</button>
        </form>
    </div>
@endsection
