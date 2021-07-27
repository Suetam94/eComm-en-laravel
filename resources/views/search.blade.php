@extends('master')
@section('content')
    <div class="custom-searched">
        <div class="searched-wrapper">
            <h3>Searched Products</h3>
            <div class="searched-style">
                @foreach($products as $product)
                    <div class="searched-item">
                        <a href="detail/{{ $product['id'] }}">
                            <img class="searched-image" src="{{ $product['gallery'] }}" alt="product">
                            <div class="">
                                <h3>{{ $product['name'] }}</h3>
                                <h5>{{ $product['description'] }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
