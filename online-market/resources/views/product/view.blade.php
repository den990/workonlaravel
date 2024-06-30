@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="col d-flex justify-content-center">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{$product->logo_path}}" class="img-fluid rounded-start w-100" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body h-100">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <div class="d-flex small text-warning mb-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i < $product->evaluation)
                                    <i class='fa fa-star' style='color: #f3da35'></i>
                                @else
                                    <i class='fa fa-star' style='color:#858585'></i>
                                @endif
                            @endfor
                        </div>
                        <p class="card-text">Это более широкая карта с вспомогательным текстом ниже в качестве
                            естественного перехода к дополнительному контенту. Этот контент немного длиннее.</p>
                        <h5 class="fw-bold">Price: {{$product->price}}$</h5>
                        <div class="mb-4 bottom-0">
                            <p class=" mb-1 text-muted small">
                                {{$product->updated_at ? $product->updated_at->format('d M Y') : $product->created_at->format('d M Y')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
