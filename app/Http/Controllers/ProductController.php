<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Services\ProductService;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;


class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

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



    public function store(StoreProductRequest $request)
    {
        $this->productService->create($request->validated());
        return redirect()->route('admin.product.index')->with('success', 'Ürün başarıyla eklendi.');
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }



    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->productService->update($product, $request->validated());
        return redirect()->route('admin.product.index')->with('success', 'Ürün başarıyla güncellendi.');
    }

    public function destroy(Product $product)
    {

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        $this->productService->delete($product);
        return redirect()->route('admin.product.index')->with('success', 'Ürün başarıyla silindi.');
    }
}
