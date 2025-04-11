<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\BlogPost;

class ActivityLogController extends Controller
{
    public function index()
    {
        $activityLogs = ActivityLog::all();
        return view('admin.activity-log.index', compact('activityLogs'));
    }
}
