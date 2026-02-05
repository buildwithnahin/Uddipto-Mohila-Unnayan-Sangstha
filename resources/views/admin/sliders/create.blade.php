@extends('layouts.admin')

@section('title', 'Add Slider')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Add Slider</h1>
    <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    <small class="text-muted">Recommended size: 1920x600 pixels</small>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="button_text" class="form-label">Button Text</label>
                    <input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text') }}" placeholder="e.g., Learn More">
                </div>
                
                <div class="mb-3">
                    <label for="button_link" class="form-label">Button Link</label>
                    <input type="text" class="form-control" id="button_link" name="button_link" value="{{ old('button_link') }}" placeholder="e.g., /about">
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
                <i class="bi bi-check-circle me-1"></i>Save Slider
            </button>
        </div>
    </form>
</div>
@endsection
