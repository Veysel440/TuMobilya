@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <img src="{{ $product->image }}" class="img-fluid mb-3" alt="{{ $product->name }}">
        <p>{{ $product->description }}</p>
        <h4>Fiyat: {{ number_format($product->price, 2) }} TL</h4>
        <a href="#" class="btn btn-success">Satın Al</a>
        <a href="{{ route('product') }}" class="btn btn-secondary">Geri Dön</a>
    </div>
@endsection
