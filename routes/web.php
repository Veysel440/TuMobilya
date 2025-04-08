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


Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::get('/blog', [BlogController::class, 'index'])->name('blog');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('menus', MenuController::class)->except(['show']);
    Route::resource('sliders', SliderController::class)->except(['show']);
    Route::resource('announcements', AnnouncementController::class)->except(['show']);
    Route::resource('products', ProductController::class)->except(['show']);
});


Route::resource('blog', BlogPostController::class);

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('admin/blogs/{id}/edit', [BlogPostController::class, 'edit'])->name('admin.blogs.edit');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('blogs', BlogPostController::class);
});

Route::get('/services', [ServisController::class, 'index']);

