<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::active()->orderBy('created_at', 'desc')->paginate(9);

        return view('frontend.projects.index', compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->where('status', true)->firstOrFail();
        $relatedProjects = Project::active()
            ->where('id', '!=', $project->id)
            ->take(3)
            ->get();

        return view('frontend.projects.show', compact('project', 'relatedProjects'));
    }
}
