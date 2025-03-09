<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{

    public function index()
    {
        $blogs = BlogPost::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $blog = new BlogPost();
        $blog->title = $request->title;
        $blog->content = $request->content;

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public/blog_images', $filename);
            $blog->image = $filename;
        }

        $blog->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog başarıyla eklendi.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog = BlogPost::findOrFail($id);

        $imagePath = $blog->image;
        if ($request->hasFile('image')) {
            // Eski görseli sil
            Storage::delete('public/blog_images/' . $blog->image);
            // Yeni görseli kaydet
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog başarıyla güncellendi.');
    }

    public function edit($id)
    {
        // Blog postunu buluyoruz
        $blog = BlogPost::findOrFail($id);

        // Edit sayfasını döndürüyoruz
        return view('admin.blogs.edit', compact('blog'));
    }

    public function destroy($id)
    {
        $blog = BlogPost::findOrFail($id);

        if ($blog->image) {
            Storage::delete('public/blog_images/' . $blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog başarıyla silindi.');
    }

}
