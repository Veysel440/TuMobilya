<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duyurular Yönetimi</title>
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
                <h1>Duyurular Yönetimi</h1>
            </div>
            <div class="header-actions">
                <span>Admin</span>
                <li><a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Çıkış Yap</a></li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </header>

        <!-- Duyurular Listesi -->
        <div class="announcement-settings-container">
            <div class="announcement-settings-actions">
                <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">Yeni Duyuru Ekle</a>
            </div>
            <h3>Duyuru Listesi</h3>
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>Başlık</th>
                        <th>Açıklama</th>
                        <th>Duyuru Fotoğrafı</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($announcements as $announcement)
                        <tr>
                            <td>{{ $announcement->title }}</td>
                            <td>{{ Str::limit($announcement->description, 30) }}</td>
                            <td><img src="{{ asset('storage/' . $announcement->image) }}" alt="{{ $announcement->title }}" width="100"></td>
                            <td>
                                <a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="btn" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </a> |
                                <form action="{{ route('admin.announcements.destroy', $announcement->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" onclick="return confirm('Duyuruyu silmek istediğinizden emin misiniz?')" title="Sil">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr class="edit-form" style="display:none;">
                            <td colspan="4">
                                <form action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <label for="title">Başlık:</label>
                                    <input type="text" name="title" value="{{ $announcement->title }}" required>
                                    <label for="description">Açıklama:</label>
                                    <textarea name="description">{{ $announcement->description }}</textarea>
                                    <label for="image">Duyuru Fotoğrafı:</label>
                                    <input type="file" name="image">
                                    <button type="submit" class="btn btn-success">Kaydet</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<script>
    document.querySelectorAll('.btn[title="Düzenle"]').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const row = this.closest('tr');
            const formRow = row.nextElementSibling;
            formRow.style.display = formRow.style.display === 'none' ? 'table-row' : 'none';
        });
    });
</script>
</body>
</html>
