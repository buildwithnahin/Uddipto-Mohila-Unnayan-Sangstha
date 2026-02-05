@extends('layouts.frontend')

@section('title', $article->title)

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>{{ $article->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($article->title, 30) }}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- News Details -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Featured Image -->
                @if($article->image && file_exists(public_path($article->image)))
                    <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="img-fluid rounded-3 shadow mb-4 w-100">
                @endif
                
                <!-- Meta Info -->
                <div class="d-flex align-items-center gap-3 mb-4">
                    @if($article->published_date)
                        <span class="text-muted"><i class="bi bi-calendar me-1"></i>{{ $article->published_date->format('M d, Y') }}</span>
                    @endif
                    @if($article->is_featured)
                        <span class="badge bg-warning text-dark">Featured</span>
                    @endif
                </div>
                
                <!-- News Content -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="content">
                            {!! $article->description !!}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Share -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h6><i class="bi bi-share me-2"></i>Share this article</h6>
                        <div class="d-flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($article->title) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Back Button -->
                <a href="{{ route('news.index') }}" class="btn btn-outline-primary w-100 mb-4">
                    <i class="bi bi-arrow-left me-2"></i>Back to News
                </a>
                
                <!-- Related News -->
                @if($relatedNews->count() > 0)
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0">Related News</h6>
                        </div>
                        <div class="card-body p-0">
                            @foreach($relatedNews as $related)
                                <a href="{{ route('news.show', $related->slug) }}" class="d-block p-3 border-bottom text-decoration-none text-dark">
                                    <h6 class="mb-1">{{ Str::limit($related->title, 50) }}</h6>
                                    @if($related->published_date)
                                        <small class="text-muted"><i class="bi bi-calendar me-1"></i>{{ $related->published_date->format('M d, Y') }}</small>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
