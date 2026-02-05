<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'status' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['status'] = $request->has('status');
        $validated['published_date'] = $validated['published_date'] ?? now();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_news.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/news'), $imageName);
            $validated['image'] = 'uploads/news/' . $imageName;
        }

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'News article created successfully.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'status' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_news.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/news'), $imageName);
            $validated['image'] = 'uploads/news/' . $imageName;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'News article updated successfully.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News article deleted successfully.');
    }
}
