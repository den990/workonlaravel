@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center flex-column align-items-center">
    @foreach ($orders as $order)
        <div class="card mb-3 col-10">
            <div class="card-header">
                Order #{{ $order->id }}
                @if($order->status_id == 1):
                    <span class="text-warning">Processing</span>
                @else
                    @if($order->status_id == 2):
                        <span class="text-success">Complete</span>
                    @else
                        <span class="text-danger">Cancel</span>
                    @endif
                @endif
            </div>
            <div class="card-body">
                <p><strong>Total Price:</strong> ${{ $order->total_price }}</p>
                <p><strong>Created:</strong> {{ $order->created_at }}</p>

                <h5>Products</h5>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
    </div>
@endsection
