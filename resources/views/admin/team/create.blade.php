@extends('layouts.admin')

@section('title', 'Add Team Member')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Add Team Member</h1>
    <a href="{{ route('admin.team.index') }}" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation') }}" required>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea class="form-control" id="bio" name="bio" rows="4">{{ old('bio') }}</textarea>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="image" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
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
                <i class="bi bi-check-circle me-1"></i>Save Member
            </button>
        </div>
    </form>
</div>
@endsection
