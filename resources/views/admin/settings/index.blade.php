<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Formunun Ayarları</title>
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin-settings.css') }}">
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
                <h1>Sitenin Genel Ayarları</h1>
            </div>
            <div class="header-user">
                <span>Admin</span>
                <li><a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Çıkış Yap</a></li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </header>

        <section class="settings">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Telefon Numarası:</label>
                    <input type="text" name="phone" class="form-control" value="{{ $settings->phone ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label>Email Adresi:</label>
                    <input type="email" name="email" class="form-control" value="{{ $settings->email ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label>Adres:</label>
                    <textarea name="address" class="form-control" required>{{ $settings->address ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <label>Kısa Adres:</label>
                    <input type="text" name="short_address" class="form-control" value="{{ $settings->short_address ?? '' }}" required>
                </div>

                <div class="form-group">
                    <label>Youtube:</label>
                    <input type="url" name="youtube" class="form-control" value="{{ $settings->youtube ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Facebook:</label>
                    <input type="url" name="facebook" class="form-control" value="{{ $settings->facebook ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Twitter:</label>
                    <input type="url" name="twitter" class="form-control" value="{{ $settings->twitter ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Instagram:</label>
                    <input type="url" name="instagram" class="form-control" value="{{ $settings->instagram ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Başlık:</label>
                    <input type="text" name="general_title" class="form-control" value="{{ $settings->general_title ?? '' }}">
                </div>
                <div class="form-group">
                    <label>Açıklama:</label>
                    <textarea name="general_description" class="form-control">{{ $settings->general_description ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <label>Fotoğraf:</label>
                    <input type="file" name="general_photo" class="form-control" id="photoInput">

                    @if(!empty($settings->general_photo) && file_exists(public_path('storage/general_photos/' . $settings->general_photo)))
                        <p>Mevcut Fotoğraf:</p>
                        <img id="previewImage"
                             src="{{ asset('storage/general_photos/' . $settings->general_photo) }}"
                             alt="General Photo"
                             style="width: 100px;">
                    @else
                        <p>Fotoğraf mevcut değil.</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Ayarları Güncelle</button>
            </form>
        </section>
    </main>
</div>

<script>
    function showSection(sectionId) {
        document.querySelectorAll('.settings-section').forEach(function(section) {
            section.classList.remove('active');
            section.style.display = 'none';
        });

        document.getElementById(sectionId).classList.add('active');
        document.getElementById(sectionId).style.display = 'block';
    }

    document.addEventListener('DOMContentLoaded', function() {
        showSection('contact');
    });
</script>
</body>
</html>
