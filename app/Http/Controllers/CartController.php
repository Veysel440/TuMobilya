<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('cart.index', compact('products'));
    }

    public function showCart()
    {
        $products = Product::all();
        return view('cart', compact('products'));
    }
    public function add($id)
    {
        $product = Product::find($id);
        $cart = Session::get('cart', []);

        if (array_key_exists($id, $cart)) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $id,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }
}
