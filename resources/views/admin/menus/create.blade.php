<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Menü Ekle</title>
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
            <div class="header-title">
                <h1>Yeni Menü Ekle</h1>
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
            <form action="{{ route('admin.menus.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="page_title">Sayfa Başlığı:</label>
                    <input type="text" name="page_title" id="page_title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="page_description">Sayfa Açıklaması:</label>
                    <textarea name="page_description" id="page_description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="title">Menü Başlığı:</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="url">URL:</label>
                    <input type="text" name="url" id="url" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Menü Ekle</button>
            </form>
        </section>
    </main>
</div>
</body>
</html>
