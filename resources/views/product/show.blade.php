<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <title>Ürün Detay - {{ $product->name }} - TuMobilya</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        /* Özel stiller */
        .product-thumbnail {
            max-width: 100%;
            height: auto;
            max-height: 300px;
        }
        .product-title {
            font-size: 1rem;
            margin-top: 10px;
        }
        .product-price, .product-description {
            margin-top: 5px;
        }
        .thumbnail-container {
            display: flex;
            margin-top: 10px;
        }
        .thumbnail {
            flex: 1;
            margin-right: 10px;
            overflow: hidden;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
        }
        .thumbnail img {
            width: 100%;
            height: auto;
        }
        .thumbnail:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Ürün Detay</h1>
                </div>
            </div>
            <div class="col-lg-7"></div>
        </div>
    </div>
</div>

<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(isset($product->image) && $product->image)
                    <img id="main-image" src="{{ asset('storage/' . $product->image) }}" class="img-fluid product-thumbnail" alt="{{ $product->name }}">
                @else
                    <img id="main-image" src="{{ asset('images/default.png') }}" class="img-fluid product-thumbnail" alt="Default Image">
                @endif

            </div>
            <div class="col-md-6">
                <h2 class="product-title">Ürün Adı: {{ $product->name }}</h2>
                <p class="product-description">Açıklama: {{ $product->product_details }}</p>
                <strong class="product-price">Fiyat: ${{ number_format($product->price, 2) }}</strong>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script>
    function changeImage(imageUrl) {
        document.getElementById('main-image').src = imageUrl;
    }
</script>
</body>
</html>
