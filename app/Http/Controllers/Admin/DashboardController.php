<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Project;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'news' => News::count(),
            'team_members' => TeamMember::count(),
            'galleries' => Gallery::count(),
            'unread_messages' => ContactMessage::unread()->count(),
            'total_messages' => ContactMessage::count(),
        ];

        $recentMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();
        $recentNews = News::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentNews'));
    }
}
