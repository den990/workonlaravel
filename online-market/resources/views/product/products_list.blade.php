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
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
