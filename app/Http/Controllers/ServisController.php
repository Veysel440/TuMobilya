<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ServisController extends Controller
{
    public function index()
    {

        $products = Product::limit(4)->get();

        return view('services.index', compact('products'));
    }
}
