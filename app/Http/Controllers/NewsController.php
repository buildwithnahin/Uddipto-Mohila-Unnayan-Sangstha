<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::active()->orderBy('published_date', 'desc')->paginate(9);

        return view('frontend.news.index', compact('news'));
    }

    public function show($slug)
    {
        $article = News::where('slug', $slug)->where('status', true)->firstOrFail();
        $relatedNews = News::active()
            ->where('id', '!=', $article->id)
            ->orderBy('published_date', 'desc')
            ->take(3)
            ->get();

        return view('frontend.news.show', compact('article', 'relatedNews'));
    }
}
