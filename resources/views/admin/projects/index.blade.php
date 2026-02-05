@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i>Add Project
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>
                            @if($project->image && file_exists(public_path($project->image)))
                                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" style="width: 60px; height: 40px; object-fit: cover; border-radius: 5px;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 40px; border-radius: 5px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ Str::limit($project->title, 40) }}</td>
                        <td>{{ $project->location ?? '-' }}</td>
                        <td>
                            @if($project->is_featured)
                                <span class="badge bg-warning text-dark">Featured</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($project->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this project?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No projects found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($projects->hasPages())
        <div class="p-3">
            {{ $projects->links() }}
        </div>
    @endif
</div>
@endsection
