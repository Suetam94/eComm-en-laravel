@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-image" src="{{ $product['gallery'] }}" alt="foto do produto">
        </div>
        <div class="col-sm-6">
            <h5>{{ $product['category'] }}</h5>
            <h3>{{ $product['name'] }}</h3>
            <p>{{ $product['description'] }}</p>
            <h4>$ {{ number_format($product['price'], 2, '.', ',') }}</h4>
            <a style="display: block" href="/">Go Back</a>

            <form action="/add_to_cart" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                <button type="submit" style="margin-top: 20px" class="btn btn-primary">Add to Cart</button>
                <button style="margin-top: 20px" class="btn btn-success">Buy Now</button>
            </form>
        </div>
    </div>
</div>
@endsection
