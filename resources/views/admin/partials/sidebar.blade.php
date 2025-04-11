<nav class="sidebar-nav">
    <ul>
        <li><a href="{{ route('admin.index') }}"><i class="fas fa-home"></i> Anasayfa</a></li>
        <li><a href="{{ route('admin.menus.index') }}"><i class="fas fa-bars"></i> Menüler</a></li>
        <li><a href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i> Kullanıcılar</a></li>
        <li><a href="{{ route('admin.settings.index') }}"><i class="fas fa-cogs"></i> Genel Ayarlar</a></li>
        <li><a href="{{ route('admin.product.index') }}"><i class="fas fa-box-open"></i> Ürünler</a></li>
        <li><a href="{{ route('admin.contact.index') }}"><i class="fas fa-box-open"></i> Mesajlar</a></li>
        <li><a href="{{ route('admin.slider.index') }}"><i class="fas fa-images"></i> Slider Yönetimi</a></li>
        <li><a href="{{ route('admin.announcements.index') }}"><i class="fas fa-bullhorn"></i> Duyurular</a></li>
        <li><a href="{{ route('admin.blogs.index') }}"><i class="fas fa-plus"></i> Yeni Blog Ekle</a></li>
        <li><a href="{{ route('admin.clearCache') }}"><i class="fas fa-trash"></i> Cache Temizle</a></li>
        <li><a href="{{ url('/') }}" target="_blank"><i class="fas fa-eye"></i> Siteyi Görüntüle</a></li>
    </ul>
</nav>
