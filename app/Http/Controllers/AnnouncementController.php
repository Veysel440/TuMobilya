<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
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

    public function index()
    {
        $announcements = Announcement::all();
        return view('admin.announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('admin.announcements.create');
    }


    public function store(StoreAnnouncementRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $this->fileUploadService->upload($request->file('image'), 'announcements');

        $this->announcementService->create($data);
        return redirect()->route('admin.announcements.index')->with('success', 'Duyuru eklendi!');
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(UpdateAnnouncementRequest $request, $id)
    {
        $announcement = Announcement::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->fileUploadService->upload($request->file('image'), 'announcements');
        }

        $this->announcementService->update($announcement, $data);
        return redirect()->route('admin.announcements.index')->with('success', 'Duyuru güncellendi!');
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with('success', 'Duyuru silindi!');
    }
}
