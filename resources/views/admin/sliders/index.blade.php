@extends('layouts.admin')

@section('title', 'Sliders')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Sliders</h1>
    <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i>Add Slider
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Button</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sliders as $slider)
                    <tr>
                        <td>
                            @if($slider->image && file_exists(public_path($slider->image)))
                                <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}" style="width: 100px; height: 50px; object-fit: cover; border-radius: 5px;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="width: 100px; height: 50px; border-radius: 5px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ Str::limit($slider->title ?? 'No title', 30) }}</td>
                        <td>{{ $slider->button_text ?? '-' }}</td>
                        <td>{{ $slider->order }}</td>
                        <td>
                            @if($slider->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Hidden</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                        <td colspan="6" class="text-center py-4 text-muted">No sliders found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($sliders->hasPages())
        <div class="p-3">
            {{ $sliders->links() }}
        </div>
    @endif
</div>
@endsection
