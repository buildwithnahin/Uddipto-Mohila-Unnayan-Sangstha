<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\News;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\TeamMember;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::active()->ordered()->get();
        $featuredProjects = Project::active()->featured()->take(3)->get();
        $latestNews = News::active()->orderBy('published_date', 'desc')->take(3)->get();
        $aboutUs = AboutUs::where('status', true)->first();

        return view('frontend.home', compact('sliders', 'featuredProjects', 'latestNews', 'aboutUs'));
    }
}
