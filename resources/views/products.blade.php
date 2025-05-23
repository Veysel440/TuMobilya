@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ürünlerimiz</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <a href="{{ route('product.show', $product->slug) }}" class="btn btn-primary">Detaylar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
