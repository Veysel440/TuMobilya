<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
<<<<<<< HEAD
class AnnouncementController extends Controller
{
=======
use App\Http\Requests\StoreAnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Services\FileUploadService;
use App\Services\AnnouncementService;
class AnnouncementController extends Controller
{
    public function __construct(
        protected FileUploadService $fileUploadService,
        protected AnnouncementService $announcementService
    ) {}


>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)
    public function index()
    {
        $announcements = Announcement::all();
        return view('admin.announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('admin.announcements.create');
    }

<<<<<<< HEAD
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('image')->store('announcements', 'public');

        Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);
=======
    public function store(StoreAnnouncementRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $this->fileUploadService->upload($request->file('image'), 'announcements');

        $this->announcementService->create($data);
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)

        return redirect()->route('admin.announcements.index')->with('success', 'Duyuru eklendi!');
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('admin.announcements.edit', compact('announcement'));
    }

<<<<<<< HEAD
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $announcement = Announcement::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('announcements', 'public');
            $announcement->image = $path;
        }

        $announcement->title = $request->title;
        $announcement->description = $request->description;
        $announcement->save();
=======
    public function update(UpdateAnnouncementRequest $request, $id)
    {
        $announcement = Announcement::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->fileUploadService->upload($request->file('image'), 'announcements');
        }

        $this->announcementService->update($announcement, $data);
>>>>>>> c5ca7ad (güncelleme işlemi yapılmıştır.)

        return redirect()->route('admin.announcements.index')->with('success', 'Duyuru güncellendi!');
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with('success', 'Duyuru silindi!');
    }
}
