<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Düzenle</title>
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-settings.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-bank-settings.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<div class="admin-container">

    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>Yönetici Paneli</h2>
        </div>
        @include('admin.partials.sidebar')
    </aside>

    <main class="main-content">
        <header class="header">
            <h1>Ürün Düzenle</h1>
        </header>


        <section class="settings">
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Ürün Adı:</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Fiyat:</label>
                    <input type="text" name="price" class="form-control" value="{{ $product->price }}" required>
                </div>

                <div class="form-group">
                    <label for="product_details">Detaylar:</label>
                    <textarea name="product_details" class="form-control" required>{{ $product->product_details }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Ürün Fotoğrafı:</label>
                    <input type="file" name="image" class="form-control">
                    @if($product->image)
                        <p>Mevcut Görsel:</p>
                        <img src="{{ asset('storage/' . $product->image) }}" width="100">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Güncelle</button>
            </form>
        </section>
    </main>
</div>
</body>
</html>
