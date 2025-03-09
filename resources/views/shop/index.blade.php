<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Mağaza - TuMobilya</title>
</head>
<body>

@include('partials.navbar')

<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h2 style="color: white;">{{ $menus[2]->page_title }}</h2>
                    <p class="mb-4">{{ $menus[2]->page_description }}</p>
                    <p><a href="{{ url('/shop') }}" class="btn btn-secondary me-2">Ürünlere Göz At</a><a href="{{ url('/about') }}" class="btn btn-white-outline">Keşfet</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="images/couch.png" class="img-fluid" alt="Couch Image">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a class="product-item" href="{{ route('product.show', $product->id) }}"> <!-- Ürün detay sayfasına yönlendirme -->
                        @if(isset($product->image) && $product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid product-thumbnail" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('images/default.png') }}" class="img-fluid product-thumbnail" alt="Default Image">
                        @endif
                        <h3 class="product-title">{{ $product->name }}</h3>
                    </a>


                </div>
            @endforeach
        </div>
    </div>
</div>

@include('partials.footer')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/tiny-slider.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
