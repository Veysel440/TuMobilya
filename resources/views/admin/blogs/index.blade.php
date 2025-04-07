<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Yönetimi</title>
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
            <h1>Blog Yönetimi</h1>
<<<<<<< HEAD
            <!-- Yeni Blog Ekle Butonu -->
=======
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-success">Yeni Blog Ekle</a>
        </header>

        <section class="settings">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Başlık</th>
                    <th>Görsel</th>
<<<<<<< HEAD
                    <th>İçerik</th> <!-- Yeni İçerik Sütunu Eklendi -->
=======
                    <th>İçerik</th>
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>
                            @if($blog->image)
                                <img src="{{ asset('storage/blog_images/' . $blog->image) }}" style="width: 100px;">
                            @else
                                <p>Resim Yok</p>
                            @endif
                        </td>
<<<<<<< HEAD
                        <td>{{ Str::limit($blog->content, 100) }} <!-- İçeriğin ilk 100 karakterini gösteriyoruz --></td>
=======
                        <td>{{ Str::limit($blog->content, 100) }}</td>
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
                        <td>
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning">Düzenle</a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Silmek istiyor musunuz?')">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </main>
</div>
</body>
</html>
