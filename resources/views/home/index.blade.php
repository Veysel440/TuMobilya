@extends('layouts.app')

@section('title', 'Anasayfa - TuMobilya')

@section('content')
    <style>
        .announcements-section {
            padding: 50px 0;
            background-color: #f9f9f9;
        }

        .announcement-entry {
            text-align: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .announcement-entry:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .announcement-img img.announcement-image {
            max-width: 100%;
            max-height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        .announcement-entry h3 {
            font-size: 1.25rem;
            margin-top: 15px;
            font-weight: 600;
        }

        .announcement-entry p {
            font-size: 1rem;
            color: #555;
        }
    </style>

    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h2 style="color: white;">{{ $menus[0]->page_title }}</h2>
                        <p class="mb-4">{{ $menus[0]->page_description }}</p>
                        <p><a href="{{ url('/shop') }}" class="btn btn-secondary me-2">Ürünlere Göz At</a><a href="{{ url('/about') }}" class="btn btn-white-outline">Keşfet</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{ asset('images/couch.png') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="heroSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h1 style="color: black;">{{ $slider->title }}</h1>
                                <p style="color: black;">{{ $slider->description }}</p>
                                <a href="{{ url('/shop') }}" class="btn btn-secondary me-2">Şimdi Alışveriş</a>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}" style="width: 500px; height: 500px; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Önceki</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sonraki</span>
        </button>
    </div>


    <div class="product-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h4 class="mb-4 section-title">Mükemmel malzeme ile hazırlanmış.</h4>
                    <p class="mb-4">Modern stüdyomuzda malzemelerimiz el yapımı ve mükemmel bir el işçiliğle hazırlandığı için malzemelerimize mükemmel derecededir.</p>
                    <p><a href="{{ url('/about') }}" class="btn">Keşfet</a></p>
                </div>

                <div class="col-md-12 col-lg-9">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                                <a class="product-item" href="{{ url('/shop') }}">
                                    <img src="{{ asset($product->image) }}" class="img-fluid product-thumbnail" alt="{{ $product->title }}">
                                    <h3 class="product-title">{{ $product->title }}</h3>
                                    <span class="icon-cross"><img src="{{ asset('images/cross.svg') }}" class="img-fluid"></span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="announcements-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center">
                    <h2 class="section-title">Duyurular</h2>
                </div>
            </div>

            <div class="row">
                @if($announcements->isEmpty())
                    <p>Duyuru bulunmamaktadır.</p>
                @else
                    @foreach($announcements as $announcement)
                        <div class="col-12 col-md-4 mb-4">
                            <div class="announcement-entry">
                                <div class="announcement-img">
                                    <img src="{{ asset($announcement->image) }}" alt="Announcement Image" class="img-fluid announcement-image" />
                                </div>
                                <h3>{{ $announcement->title }}</h3>
                                <p>{{ $announcement->description }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
