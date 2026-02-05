@extends('layouts.admin')

@section('title', 'Add News')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Add News</h1>
    <a href="{{ route('admin.news.index') }}" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea class="form-control" id="short_description" name="short_description" rows="2">{{ old('short_description') }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Content <span class="text-danger">*</span></label>
                    <textarea class="form-control tinymce" id="description" name="description" rows="10">{{ old('description') }}</textarea>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="image" class="form-label">Featured Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                
                <div class="mb-3">
                    <label for="published_date" class="form-label">Published Date</label>
                    <input type="date" class="form-control" id="published_date" name="published_date" value="{{ old('published_date', date('Y-m-d')) }}">
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured</label>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="status" name="status" {{ old('status', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i>Save News
            </button>
        </div>
    </form>
</div>
@endsection
