<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function edit()
    {
        $aboutUs = AboutUs::first();
        return view('admin.about.edit', compact('aboutUs'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'history' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean',
        ]);

        $aboutUs = AboutUs::first();
        
        if (!$aboutUs) {
            $aboutUs = new AboutUs();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_about.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/about'), $imageName);
            $validated['image'] = 'uploads/about/' . $imageName;
        }

        $validated['status'] = $request->has('status');
        $aboutUs->fill($validated);
        $aboutUs->save();

        return redirect()->route('admin.about.edit')->with('success', 'About Us updated successfully.');
    }
}
