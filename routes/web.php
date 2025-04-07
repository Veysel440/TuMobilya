<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', function () {
    return view('contact.index');
});

Route::get('/shop', [ShopController::class, 'index']);
Route::get('/services', [PageController::class, 'services']);
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::post('/admin/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('admin.logout');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::view('/', 'admin')->name('index');

    Route::resource('/users', UserController::class);
    Route::get('/users/{id}/change-password', [UserController::class, 'changePassword'])->name('users.change-password');


        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'updateSettings'])->name('settings.update');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

<<<<<<< HEAD
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
});
=======
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::get('/blog', [BlogController::class, 'index'])->name('blog');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::prefix('admin')->name('admin.')->group(function () {
<<<<<<< HEAD
    Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
    Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
    Route::get('/menus/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::put('/menus/{id}', [MenuController::class, 'update'])->name('menus.update');
    Route::delete('/menus/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('/sliders', [SliderController::class, 'index'])->name('admin.slider.index');
});

Route::prefix('admin')->group(function () {
    Route::get('/sliders', [SliderController::class, 'index'])->name('admin.slider.index');
    Route::get('/sliders/create', [SliderController::class, 'create'])->name('admin.slider.create');
    Route::post('/sliders', [SliderController::class, 'store'])->name('admin.slider.store');
    Route::get('/sliders/{slider}/edit', [SliderController::class, 'edit'])->name('admin.slider.edit');
    Route::put('/sliders/{slider}', [SliderController::class, 'update'])->name('admin.slider.update');
    Route::delete('/sliders/{slider}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');
});


Route::prefix('admin')->group(function () {
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('admin.announcements.index');
    Route::get('/announcements/create', [AnnouncementController::class, 'create'])->name('admin.announcements.create');
    Route::post('/announcements', [AnnouncementController::class, 'store'])->name('admin.announcements.store');
    Route::get('/announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('admin.announcements.edit');
    Route::put('/announcements/{announcement}', [AnnouncementController::class, 'update'])->name('admin.announcements.update');
    Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('admin.announcements.destroy');
=======
    Route::resource('menus', MenuController::class)->except(['show']);
    Route::resource('sliders', SliderController::class)->except(['show']);
    Route::resource('announcements', AnnouncementController::class)->except(['show']);
    Route::resource('products', ProductController::class)->except(['show']);
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
});


Route::resource('blog', BlogPostController::class);

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('admin/blogs/{id}/edit', [BlogPostController::class, 'edit'])->name('admin.blogs.edit');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('blogs', BlogPostController::class);
});

Route::get('/services', [ServisController::class, 'index']);

