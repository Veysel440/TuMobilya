<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Düzenle</title>
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
            <h1>Blog Düzenle</h1>
        </header>

        <section class="settings">
            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Başlık:</label>
                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                </div>

                <div class="form-group">
                    <label for="content">İçerik:</label>
                    <textarea name="content" class="form-control" required>{{ $blog->content }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Görsel:</label>
                    <input type="file" name="image" class="form-control">
                    @if($blog->image)
                        <p>Mevcut Görsel:</p>
                        <img src="{{ asset('storage/blog_images/' . $blog->image) }}" width="100">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Güncelle</button>
            </form>
        </section>
    </main>
</div>
</body>
</html>
