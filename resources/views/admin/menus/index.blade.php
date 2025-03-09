<!DOCTYPE html>
<html lang="en">
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
                            <button class="edit-button" onclick="editMenu({{ $menu->id }}, '{{ $menu->title }}', '{{ $menu->url }}', '{{ $menu->page_title }}', '{{ $menu->page_description }}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button" onclick="return confirm('Menüyü silmek istediğinizden emin misiniz?')" title="Sil">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="form-container">
            <h3>Yeni Menü Ekle</h3>
            <form action="{{ route('admin.menus.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Sayfa Başlığı:</label>
                    <input type="text" id="page_title" name="page_title" required>
                </div>
                <div class="form-group">
                    <label>Sayfa Açıklaması:</label>
                    <textarea id="page_description" name="page_description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label>Başlık:</label>
                    <input type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label>URL:</label>
                    <input type="text" name="url" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Menüyü Ekle</button>
                </div>
            </form>
        </div>


        <div class="edit-form-container" style="display:none;">
            <h3>Menü Düzenle</h3>
            <form id="edit-menu-form" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Sayfa Başlığı:</label>
                    <input type="text" id="page_title" name="page_title" required>
                </div>
                <div class="form-group">
                    <label>Sayfa Açıklaması:</label>
                    <textarea id="page_description" name="page_description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label>Başlık:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label>URL:</label>
                    <input type="text" id="url" name="url" required>
                </div>
                <div class="form-group">
                    <input type="hidden" id="edit-menu-id" name="menu_id">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                    <button type="button" class="btn btn-secondary" onclick="closeEditForm()">Kapat</button>
                </div>
            </form>
        </div>
    </main>
</div>

<script>
    function editMenu(id, title, url, pageTitle, pageDescription) {
        document.getElementById('edit-menu-id').value = id;
        document.getElementById('title').value = title;
        document.getElementById('url').value = url;
        document.getElementById('page_title').value = pageTitle;
        document.getElementById('page_description').value = pageDescription;
        document.getElementById('edit-menu-form').action = "{{ url('admin/menus') }}/" + id;
        document.querySelector('.edit-form-container').style.display = 'block';
    }

    function closeEditForm() {
        document.querySelector('.edit-form-container').style.display = 'none';
    }
</script>

</body>
</html>
