<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
<<<<<<< HEAD
    <!-- Admin Settings CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/admin-settings.css') }}">
    <!-- Font Awesome için ikonlar -->
=======
    <link rel="stylesheet" href="{{ asset('admin/css/admin-settings.css') }}">
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
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
                <h1>Hoşgeldiniz</h1>
            </div>
            <div class="header-user">
                <span>Admin</span>
                <li><a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Çıkış Yap</a></li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </header>
        <section class="dashboard">
            <div class="card">
                <h3>Özet</h3>
                <p>Burada özet bilgileri görebilirsiniz.</p>
            </div>
            <div class="card">
                <h3>Son Aktiviteler</h3>
                <p>Son aktiviteler burada listelenecek.</p>
            </div>
        </section>
    </main>
</div>
</body>
</html>
