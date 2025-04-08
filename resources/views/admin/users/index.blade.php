<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Yönetimi</title>
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
                <h1>Kullanıcı Yönetimi</h1>
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

        <div class="user-container">
            <h3>Mevcut Kullanıcıları Yönet</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>E-posta</th>
                    <th>Şifre</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->email }}</td>
                        <td>******</td>
                        <td>
<<<<<<< HEAD
                            <!-- Düzenleme butonu -->
=======
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
                            <button class="edit-button" onclick="editUser({{ $user->id }}, '{{ $user->email }}', '{{ $user->password }}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Kullanıcıyı silmek istediğinizden emin misiniz?')" title="Sil">
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
            <h3>Yeni Kullanıcı Ekle</h3>
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>E-posta:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Şifre:</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Kullanıcıyı Ekle</button>
                </div>
            </form>
        </div>

<<<<<<< HEAD
        <!-- Düzenleme Formu -->
=======
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
        <div class="edit-form-container" style="display:none;">
            <h3>Kullanıcıyı Düzenle</h3>
            <form id="edit-user-form" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>E-posta:</label>
                    <input type="email" id="edit-email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Şifre:</label>
                    <input type="password" id="edit-password" name="password" required>
                </div>
                <div class="form-group">
                    <input type="hidden" id="edit-user-id" name="user_id">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                    <button type="button" class="btn btn-secondary" onclick="closeEditForm()">Kapat</button>
                </div>
            </form>
        </div>
    </main>
</div>

<script>
    function editUser(id, email, password) {
        document.getElementById('edit-user-id').value = id;
        document.getElementById('edit-email').value = email;
        document.getElementById('edit-password').value = password;
        document.getElementById('edit-user-form').action = "{{ url('admin/users') }}/" + id;
        document.querySelector('.edit-form-container').style.display = 'block';
    }

    function closeEditForm() {
        document.querySelector('.edit-form-container').style.display = 'none';
    }
</script>

</body>
</html>
