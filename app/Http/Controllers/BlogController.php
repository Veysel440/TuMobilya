<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        // announcements ve blogPost verilerini alıyoruz
        $announcements = Announcement::all();
        $blogPosts = BlogPost::all();

        // Verileri view'a gönderiyoruz
=======
        $announcements = Announcement::all();
        $blogPosts = BlogPost::all();

>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
        return view('blog.index', compact('announcements', 'blogPosts'));
    }

    public function show($id)
    {
        $blogPost = BlogPost::find($id);
<<<<<<< HEAD

        // Detaylı blog sayfasını döndürüyoruz
=======
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
        return view('blog.show', compact('blogPost'));
    }

}
