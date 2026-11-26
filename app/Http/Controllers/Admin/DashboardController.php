<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Post;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'projectCount' => Project::count(),
            'postCount' => Post::count(),
            'messageCount' => Message::count(),
            'unreadCount' => Message::whereNull('read_at')->count(),
            'latestMessages' => Message::latest()->take(5)->get(),
        ]);
    }
}
