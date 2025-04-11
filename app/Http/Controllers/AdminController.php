<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;

class AdminController extends Controller
{

    public function showActivityLog()
    {
        $activityLogs = ActivityLog::orderBy('created_at', 'desc')->get();
        return view('admin.activity-log.index', compact('activityLogs'));
    }

    public function settings()
    {
        return view('admin.settings.index');
    }
}
