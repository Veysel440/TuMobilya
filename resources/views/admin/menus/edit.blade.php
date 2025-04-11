<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menü Düzenle</title>
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-settings.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-bank-settings.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .btn i {
            font-size: 0.9rem;
        }
    </style>
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
            <div class="header-title">
                <h1>Menü Düzenle</h1>
            </div>
            <div class="header-user">
                <span>Admin</span>
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Çıkış Yap
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </header>

        <section class="settings">
            <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Sayfa Başlığı:</label>
                    <input type="text" name="page_title" class="form-control" value="{{ $menu->page_title }}" required>
                </div>

                <div class="form-group">
                    <label>Sayfa Açıklaması:</label>
                    <textarea name="page_description" class="form-control" rows="4" required>{{ $menu->page_description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Başlık:</label>
                    <input type="text" name="title" class="form-control" value="{{ $menu->title }}" required>
                </div>

                <div class="form-group">
                    <label>URL:</label>
                    <input type="text" name="url" class="form-control" value="{{ $menu->url }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Güncelle</button>
            </form>
        </section>
    </main>
</div>
</body>
</html>
