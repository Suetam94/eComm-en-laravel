@extends('master')
@section('content')
    <div class="custom-cart">
        <div class="cart-wrapper">
            <div class="cart-style">
                <h2>Added Products</h2>
                <a class="btn btn-success" href="/order_now">Order now</a>
                @foreach($products as $product)
                    <div class="cart-item">
                        <a class="cart-link" href="detail/{{ $product->id }}">
                            <img class="cart-image" src="{{ $product->gallery }}" alt="product">
                            <div>
                                <h3>{{ $product->name }}</h3>
                                <h5>{{ $product->description }}</h5>
                            </div>
                        </a>
                        <a href="/remove_to_cart/{{ $product->cart_id }}" style="height: fit-content; margin-left: 30px" class="btn btn-danger">Remove to Cart</a>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
