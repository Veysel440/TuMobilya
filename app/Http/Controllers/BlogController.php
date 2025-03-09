<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        // announcements ve blogPost verilerini alıyoruz
        $announcements = Announcement::all();
        $blogPosts = BlogPost::all();

        // Verileri view'a gönderiyoruz
        return view('blog.index', compact('announcements', 'blogPosts'));
    }

    public function show($id)
    {
        $blogPost = BlogPost::find($id);

        // Detaylı blog sayfasını döndürüyoruz
        return view('blog.show', compact('blogPost'));
    }

}
