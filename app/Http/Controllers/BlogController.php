<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        $blogPosts = BlogPost::all();

        $announcements = Announcement::all();
        $blogPosts = BlogPost::all();

        return view('blog.index', compact('announcements', 'blogPosts'));
    }

    public function show($id)
    {
        $blogPost = BlogPost::find($id);

        return view('blog.show', compact('blogPost'));
    }

}
