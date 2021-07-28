<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }

    public function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }

    public function search(Request $request)
    {
        $data = Product::where('name', 'like', '%' . $request->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }

    public function addToCart(Request $request)
    {
        if ($request->session()->has('user')) {
            $cart = new Cart();
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();

        }
        return redirect('/login');
    }

    public static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    public function cartList()
    {
        if (!empty(Session::get('user'))) {
            $userId = Session::get('user')['id'];
            $products = $this->getProducts($userId);

            return view('cart-list', ['products' => $products]);
        }

        return redirect('/');
    }

    public function cartRemove($id)
    {
        Cart::destroy($id);

        return redirect('/cart_list');
    }

    public function orderNow()
    {
        if (!empty(Session::get('user'))) {
            $userId = Session::get('user')['id'];
            $total = $this->getCartTotal($userId);
            $products = $this->getProducts($userId);

            return view('order', ['total' => $total, 'products' => $products]);
        }

        return redirect('/');
    }

    public function confirmOrder(Request $request)
    {
        $products = null;
        $total = null;
        $address = $request->input('address');
        $paymentMethod = $request->input('payment_method');


        if (!empty(Session::get('user'))) {
            $userId = Session::get('user')['id'];
            $products = $this->getProducts($userId);
            $total = $this->getCartTotal($userId);
            $allCart = Cart::where('user_id', $userId)->get();
            foreach ($allCart as $cart) {
                $order = new Order();
                $order->product_id = $cart['product_id'];
                $order->user_id = $cart['user_id'];
                $order->status = 'pending';
                $order->payment_method = $request->input('payment_method');
                $order->payment_status = 'pending';
                $order->address = $request->input('address');
                $order->save();
                Cart::where('user_id', $userId)->delete();
            }
        }

        return view('order-confirmed', ['products' => $products, 'total' => $total, 'address' => $address, 'paymentMethod' => $paymentMethod]);
    }

    public function listOrders()
    {
        if (!empty(Session::get('user'))) {
            $userId = Session::get('user')['id'];
            $orders = $this->getProductOrders($userId);

            return view('my-orders', ['orders' => $orders]);
        }
    }

    public function getCartTotal($userId)
    {
        return DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');
    }

    public function getProductOrders($userId): Collection
    {
        return DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();
    }

    public function getProducts($userId)
    {
        return DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();
    }
}
