<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menü Yönetimi</title>
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
                <h1>Menü Yönetimi</h1>
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

        <div class="menu-container">
            <h3>Mevcut Menüleri Yönet</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Menu Adı</th>
                    <th>URL</th>
                    <th>Sayfa Başlığı</th>
                    <th>Sayfa Açıklaması</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{ $menu->title }}</td>
                        <td>{{ $menu->url }}</td>
                        <td>{{ $menu->page_title }}</td>
                        <td>{{ $menu->page_description }}</td>
                        <td>
                            <!-- Düzenleme butonuna tıklandığında, düzenleme sayfasına yönlendirilir -->
                            <a href="{{ route('admin.menus.edit', $menu->id) }}" class="edit-button">
                                <i class="fas fa-edit" style="font-size: 14px;"></i>
                            </a>
                            <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button" onclick="return confirm('Menüyü silmek istediğinizden emin misiniz?')" title="Sil">
                                    <i class="fas fa-trash" style="font-size: 14px;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Yeni Menü Ekleme butonu -->
        <div class="form-container">
            <h3>Yeni Menü Ekle</h3>
            <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">Yeni Menü Ekle</a>
        </div>
    </main>
</div>

<script>
    // Gereksiz edit ve delete işlevlerini kaldırdık
</script>

</body>
</html>
