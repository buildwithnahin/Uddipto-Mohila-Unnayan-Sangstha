<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::ordered()->paginate(10);
        return view('admin.team.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);

        $validated['status'] = $request->has('status');
        $validated['order'] = $validated['order'] ?? 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_team.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/team'), $imageName);
            $validated['image'] = 'uploads/team/' . $imageName;
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', ['teamMember' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);

        $validated['status'] = $request->has('status');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_team.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/team'), $imageName);
            $validated['image'] = 'uploads/team/' . $imageName;
        }

        $team->update($validated);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $team)
    {
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team member deleted successfully.');
    }
}
