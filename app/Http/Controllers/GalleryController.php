<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::active()->ordered()->paginate(12);
        $categories = Gallery::active()->distinct()->pluck('category')->filter();

        return view('frontend.gallery', compact('galleries', 'categories'));
    }
}
