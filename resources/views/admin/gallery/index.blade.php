@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Gallery</h1>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i>Add Image
    </a>
</div>

<div class="row">
    @forelse($galleries as $gallery)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                @if($gallery->image && file_exists(public_path($gallery->image)))
                    <img src="{{ asset($gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 150px; object-fit: cover;">
                @else
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
                        <i class="bi bi-image fs-1 text-muted"></i>
                    </div>
                @endif
                <div class="card-body p-3">
                    <h6 class="card-title mb-1">{{ Str::limit($gallery->title, 25) }}</h6>
                    @if($gallery->category)
                        <small class="text-muted"><i class="bi bi-folder me-1"></i>{{ $gallery->category }}</small>
                    @endif
                    <div class="mt-2">
                        @if($gallery->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Hidden</span>
                        @endif
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 p-3 pt-0">
                    <a href="{{ route('admin.gallery.edit', $gallery) }}" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">No gallery images found</div>
        </div>
    @endforelse
</div>

@if($galleries->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $galleries->links() }}
    </div>
@endif
@endsection
