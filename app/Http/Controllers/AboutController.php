<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\TeamMember;

class AboutController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::where('status', true)->first();
        $teamMembers = TeamMember::active()->ordered()->get();

        return view('frontend.about', compact('aboutUs', 'teamMembers'));
    }
}
