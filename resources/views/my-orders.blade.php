@extends('master')
@section('content')
    <div class="custom-cart">
        <div class="cart-wrapper">
            <div class="cart-style">
                <h2>My Orders</h2>
                <a class="btn btn-success" href="/">Back to main page</a>
                @foreach($orders as $order)
                    <div class="cart-item">
                        <a class="cart-link" href="detail/{{ $order->id }}">
                            <img class="cart-image" src="{{ $order->gallery }}" alt="product">
                        </a>
                    </div>
                    <div class="">
                        <div>
                            <h4>Name: {{ $order->name }}</h4>
                            <h4>Delivery status: {{ $order->status }}</h4>
                            <h4>Address: {{ $order->address }}</h4>
                            <h4>Payment status: {{ $order->payment_status }}</h4>
                            <h4>Payment method: {{ $order->payment_method }}</h4>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
