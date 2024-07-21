@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Your Cart</h3>
                @if ($cartItems->isEmpty())
                    <p>Your cart is empty</p>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td> <a href="{{ route('product.view', $item->product->id) }}">{{ $item->product->name }}</a></td>
                                <td>
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button type="submit">
                                    </form>
                                </td>
                                <td>${{ $item->product->price }}</td>
                                <td>${{ $item->product->price * $item->quantity }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
