<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Storage;
use App\Services\BlogPostService;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;


class BlogPostController extends Controller
{
    protected BlogPostService $blogPostService;

    public function __construct(BlogPostService $blogPostService)
    {
        $this->blogPostService = $blogPostService;
    }

    public function index()
    {
        $blogs = BlogPost::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }


    public function store(StoreBlogPostRequest $request)
    {
        $this->blogPostService->create($request->validated());
        return redirect()->route('admin.blogs.index')->with('success', 'Blog başarıyla eklendi.');
    }

    public function update(UpdateBlogPostRequest $request, $id)
    {
        $blog = BlogPost::findOrFail($id);
        $this->blogPostService->update($blog, $request->validated());

        return redirect()->route('admin.blogs.index')->with('success', 'Blog başarıyla güncellendi.');
    }

    public function edit($id)
    {
        $blog = BlogPost::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function destroy($id)
    {
        $this->blogPostService->delete($blog);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog başarıyla silindi.');
    }
}
