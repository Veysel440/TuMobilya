<?php

use App\Http\Controllers\Admin\activity_logsController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/admin/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize');

    return redirect()->route('admin.index')->with('success', 'Admin ve site cache\'i başarıyla temizlendi ve optimizasyon yapıldı.');
})->name('admin.clearCache');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/shop', [ShopController::class, 'index']);
Route::get('/services', [ServisController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');


Route::post('/admin/logout', function () {
    Auth::logout(); 
    return redirect('/');
})->name('admin.logout');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::view('/', 'admin')->name('index');

    Route::get('/users/{id}/change-password', [UserController::class, 'changePassword'])->name('users.change-password');

        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'updateSettings'])->name('settings.update');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('menus', MenuController::class)->except(['show']);
    Route::resource('slider', SliderController::class)->except(['show']);
    Route::resource('announcements', AnnouncementController::class)->except(['show']);
    Route::resource('product', ProductController::class)->except(['show']);
    Route::resource('blogs', BlogPostController::class)->except(['show']);
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('contact', ContactsController::class)->except(['show']);
});


Route::get('/admin/activity-log', [ActivityLogController::class, 'index'])->name('admin.activity-log.index');

