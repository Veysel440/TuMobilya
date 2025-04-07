<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
=======
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

<<<<<<< HEAD
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'product_details' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product', 'public');
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
            'product_details' => $request->product_details
        ]);

=======
    public function store(StoreProductRequest $request)
    {
        $this->productService->create($request->validated());
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
        return redirect()->route('admin.product.index')->with('success', 'Ürün başarıyla eklendi.');
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

<<<<<<< HEAD
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'product_details' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->product_details = $request->product_details;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        $product->save();

=======
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->productService->update($product, $request->validated());
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
        return redirect()->route('admin.product.index')->with('success', 'Ürün başarıyla güncellendi.');
    }

    public function destroy(Product $product)
    {
<<<<<<< HEAD
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
=======
        $this->productService->delete($product);
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
        return redirect()->route('admin.product.index')->with('success', 'Ürün başarıyla silindi.');
    }
}
