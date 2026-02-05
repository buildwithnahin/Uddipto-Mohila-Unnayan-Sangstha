@extends('layouts.admin')

@section('title', 'Add Gallery Image')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Add Gallery Image</h1>
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}" placeholder="e.g., Training, Events">
                </div>
                
                <div class="mb-3">
                    <label for="order" class="form-label">Display Order</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', 0) }}" min="0">
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
                <i class="bi bi-check-circle me-1"></i>Save Image
            </button>
        </div>
    </form>
</div>
@endsection
