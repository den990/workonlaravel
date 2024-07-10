@extends('admin.layouts.main')

@section('title', 'Products')

@section('admin-content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form id="search-form" class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search for products" id="query"
                           name="query" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    <button class="btn btn-outline-danger ms-2" type="button" id="clear-search">Clear</button>
                </form>
            </div>
        </div>

        <div class="row row-cols-4 mt-5" id="product-list">
            @foreach($products as $product)
                <div class="col-3 mb-5 px-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{$product->logo_path}}" alt="..."/>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">
                                    <a href="{{ route('product.view', $product->id) }}">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i < $product->evaluation)
                                            <i class='fa fa-star' style='color: #f3da35'></i>
                                        @else
                                            <i class='fa fa-star' style='color:#858585'></i>
                                        @endif
                                    @endfor
                                </div>
                                <!-- Product price-->
                                {{$product->price}}$
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="{{ route('product.edit', $product->id) }}">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script type="module">
        $(document).ready(function () {
            $('#search-form').on('submit', function (event) {
                event.preventDefault();
                performSearch();
            });

            $('#clear-search').on('click', function () {
                $('#query').val('');
                performSearch(true);
            });

            function performSearch(clear = false) {
                let query = $('#query').val();
                if (clear) query = '';

                $.ajax({
                    url: '{{ route('product.search') }}',
                    type: 'GET',
                    data: {query: query},
                    success: function (response) {
                        $('#product-list').html(response);
                    }
                });
            }
        });
    </script>
@endsection
