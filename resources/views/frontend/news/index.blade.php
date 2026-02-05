@extends('layouts.frontend')

@section('title', 'News & Events')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>News & Events</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">News</li>
            </ol>
        </nav>
    </div>
</div>

<!-- News List -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @forelse($news as $article)
                <div class="col-md-4 mb-4 fade-in">
                    <div class="card h-100">
                        @if($article->image && file_exists(public_path($article->image)))
                            <img src="{{ asset($article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-newspaper fs-1 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            @if($article->published_date)
                                <p class="text-muted small mb-2">
                                    <i class="bi bi-calendar me-1"></i>{{ $article->published_date->format('M d, Y') }}
                                </p>
                            @endif
                            @if($article->is_featured)
                                <span class="badge bg-warning text-dark mb-2">Featured</span>
                            @endif
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($article->short_description, 120) }}</p>
                            <a href="{{ route('news.show', $article->slug) }}" class="btn btn-sm btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle me-2"></i>No news available at the moment.
                    </div>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($news->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
