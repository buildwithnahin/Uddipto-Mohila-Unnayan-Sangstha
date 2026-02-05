<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;

class TeamController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::active()->ordered()->get();

        return view('frontend.team', compact('teamMembers'));
    }
}
