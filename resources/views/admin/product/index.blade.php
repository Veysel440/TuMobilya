<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Yönetimi</title>
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
                <h1>Ürün Yönetimi</h1>
            </div>
            <div class="header-actions">
                <span>Admin</span>
                <li><a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Çıkış Yap</a></li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </header>

<<<<<<< HEAD
        <!-- Ürünler Listesi -->
=======
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
        <div class="product-settings-container">
            <div class="product-settings-actions">
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Yeni Ürün Ekle</a>
            </div>
            <h3>Ürünler Listesi</h3>
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>Ürün Adı</th>
                        <th>Ürün Fotoğrafı</th>
                        <th>Fiyat</th>
<<<<<<< HEAD
                        <th>Detaylar</th> <!-- Yeni sütun -->
=======
                        <th>Detaylar</th>
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100"></td>
                            <td>{{ $product->price }} ₺</td>
<<<<<<< HEAD
                            <td>{{ Str::limit($product->product_details, 30) }}</td> <!-- Sadece 30 karakter gösteriliyor -->
=======
                            <td>{{ Str::limit($product->product_details, 30) }}</td>
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
                            <td>
                                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn" title="Düzenle">
                                    <i class="fas fa-edit"></i>
                                </a> |
                                <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" onclick="return confirm('Ürünü silmek istediğinizden emin misiniz?')" title="Sil">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr class="edit-form" style="display:none;">
                            <td colspan="5">
                                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <label for="name">Ürün Adı:</label>
                                    <input type="text" name="name" value="{{ $product->name }}" required>
                                    <label for="image">Ürün Fotoğrafı:</label>
                                    <input type="file" name="image">
                                    <label for="price">Fiyat:</label>
                                    <input type="text" name="price" value="{{ $product->price }}" required>
<<<<<<< HEAD
                                    <label for="product_details">Ürün Detayları:</label> <!-- Yeni alan -->
                                    <textarea name="product_details">{{ $product->product_details }}</textarea> <!-- Detaylar girişi -->
=======
                                    <label for="product_details">Ürün Detayları:</label>
                                    <textarea name="product_details">{{ $product->product_details }}</textarea>
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
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
