@extends('layouts.admin')

@section('title', 'Edit Slider')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Edit Slider</h1>
    <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $slider->title) }}">
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $slider->description) }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    @if($slider->image)
                        <div class="mt-2">
                            <img src="{{ asset($slider->image) }}" alt="Current Image" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="button_text" class="form-label">Button Text</label>
                    <input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text', $slider->button_text) }}">
                </div>
                
                <div class="mb-3">
                    <label for="button_link" class="form-label">Button Link</label>
                    <input type="text" class="form-control" id="button_link" name="button_link" value="{{ old('button_link', $slider->button_link) }}">
                </div>
                
                <div class="mb-3">
                    <label for="order" class="form-label">Display Order</label>
                    <input type="number" class="form-control" id="order" name="order" value="{{ old('order', $slider->order) }}" min="0">
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="status" name="status" {{ old('status', $slider->status) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i>Update Slider
            </button>
        </div>
    </form>
</div>
@endsection
