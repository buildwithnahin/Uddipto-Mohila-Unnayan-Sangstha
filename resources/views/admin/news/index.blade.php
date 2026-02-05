@extends('layouts.admin')

@section('title', 'News')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>News & Events</h1>
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i>Add News
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($news as $article)
                    <tr>
                        <td>
                            @if($article->image && file_exists(public_path($article->image)))
                                <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" style="width: 60px; height: 40px; object-fit: cover; border-radius: 5px;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 40px; border-radius: 5px;">
                                    <i class="bi bi-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ Str::limit($article->title, 40) }}</td>
                        <td>{{ $article->published_date?->format('M d, Y') ?? '-' }}</td>
                        <td>
                            @if($article->is_featured)
                                <span class="badge bg-warning text-dark">Featured</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($article->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.news.edit', $article) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.news.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                        <td colspan="6" class="text-center py-4 text-muted">No news found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($news->hasPages())
        <div class="p-3">
            {{ $news->links() }}
        </div>
    @endif
</div>
@endsection
