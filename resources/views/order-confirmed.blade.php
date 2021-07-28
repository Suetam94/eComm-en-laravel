@extends('master')
@section('content')
    <div class="custom-order">
        @if(!empty($address) && !empty($product) && !empty($paymentMethod) && !empty($total))
            <h2>Great! Your order has been made!</h2>
            <div class="order-table">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>$ {{ number_format($product->price, 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td>Total</td>
                        <td>$ {{ number_format($total, 2, '.', ',') }}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="shipment-info">
                <h3>Shipment Info</h3>
                <p>{{ $address }}</p>
                <p>{{ $paymentMethod }}</p>
            </div>
        @else
            <div class="container alert alert-danger text-center" role="alert"><a href="/order_now">Oops! Something is wrong, please check and return to order.</a></div>
        @endif
    </div>
@endsection
