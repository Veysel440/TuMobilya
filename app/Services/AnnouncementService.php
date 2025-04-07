<?php

namespace App\Services;

use App\Models\Announcement;

class AnnouncementService
{
    public function create(array $data): Announcement
    {
        return Announcement::create($data);
    }

    public function update(Announcement $announcement, array $data): Announcement
    {
        $announcement->update($data);
        return $announcement;
    }
}
