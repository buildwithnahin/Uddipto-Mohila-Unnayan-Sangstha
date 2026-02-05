@extends('layouts.admin')

@section('title', 'Edit About Us')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>About Us</h1>
</div>

<div class="form-card">
    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $aboutUs->title ?? '') }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control tinymce" id="description" name="description" rows="5">{{ old('description', $aboutUs->description ?? '') }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="mission" class="form-label">Mission</label>
                    <textarea class="form-control tinymce" id="mission" name="mission" rows="4">{{ old('mission', $aboutUs->mission ?? '') }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="vision" class="form-label">Vision</label>
                    <textarea class="form-control tinymce" id="vision" name="vision" rows="4">{{ old('vision', $aboutUs->vision ?? '') }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="history" class="form-label">History</label>
                    <textarea class="form-control tinymce" id="history" name="history" rows="4">{{ old('history', $aboutUs->history ?? '') }}</textarea>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    @if($aboutUs && $aboutUs->image)
                        <div class="mt-2">
                            <img src="{{ asset($aboutUs->image) }}" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                    @endif
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="status" name="status" {{ old('status', $aboutUs->status ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i>Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
