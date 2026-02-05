<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::ordered()->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);

        $validated['status'] = $request->has('status');
        $validated['order'] = $validated['order'] ?? 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_slider.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/sliders'), $imageName);
            $validated['image'] = 'uploads/sliders/' . $imageName;
        }

        Slider::create($validated);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);

        $validated['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_slider.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/sliders'), $imageName);
            $validated['image'] = 'uploads/sliders/' . $imageName;
        }

        $slider->update($validated);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
