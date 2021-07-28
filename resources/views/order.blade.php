@extends('master')
@section('content')
    <div class="container custom-cart">
        <h2>Order Resume</h2>
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

        <form action="/confirm_order" method="post">
            @csrf
            <div class="form-group">
                <textarea required name="address" style="width: 100%; height: fit-content" placeholder="Enter your address"></textarea>
            </div>
            <div class="form-group">
                <label>Payment Method
                    <select required name="payment_method" style="width: 100%; font-weight: lighter">
                        <option value="credit_cart">Credit cart</option>
                        <option value="debit_cart">Debit cart</option>
                        <option value="bank_transfer">Bank transfer</option>
                    </select>
                </label>
            </div>
            <button type="submit" class="btn btn-success">Confirm order</button>
            <a href="/" type="submit" class="btn btn-primary">Keep buying</a>
        </form>

    </div>

@endsection
