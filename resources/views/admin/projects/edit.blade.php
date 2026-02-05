@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Edit Project</h1>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea class="form-control" id="short_description" name="short_description" rows="2">{{ old('short_description', $project->short_description) }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control tinymce" id="description" name="description" rows="10">{{ old('description', $project->description) }}</textarea>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="image" class="form-label">Featured Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    @if($project->image)
                        <div class="mt-2">
                            <img src="{{ asset($project->image) }}" alt="Current Image" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label for="donor" class="form-label">Donor/Partner</label>
                    <input type="text" class="form-control" id="donor" name="donor" value="{{ old('donor', $project->donor) }}">
                </div>
                
                <div class="mb-3">
                    <label for="budget" class="form-label">Budget</label>
                    <input type="text" class="form-control" id="budget" name="budget" value="{{ old('budget', $project->budget) }}">
                </div>
                
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $project->location) }}">
                </div>
                
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $project->start_date?->format('Y-m-d')) }}">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $project->end_date?->format('Y-m-d')) }}">
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured</label>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="status" name="status" {{ old('status', $project->status) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i>Update Project
            </button>
        </div>
    </form>
</div>
@endsection
