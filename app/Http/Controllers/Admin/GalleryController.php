<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::ordered()->paginate(12);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:100',
            'order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);

        $validated['status'] = $request->has('status');
        $validated['order'] = $validated['order'] ?? 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_gallery.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/gallery'), $imageName);
            $validated['image'] = 'uploads/gallery/' . $imageName;
        }

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image added successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:100',
            'order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);

        $validated['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_gallery.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/gallery'), $imageName);
            $validated['image'] = 'uploads/gallery/' . $imageName;
        }

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image deleted successfully.');
    }
}
