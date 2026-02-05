@extends('layouts.frontend')

@section('title', $project->title)

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>{{ $project->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($project->title, 30) }}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Project Details -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Featured Image -->
                @if($project->image && file_exists(public_path($project->image)))
                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="img-fluid rounded-3 shadow mb-4 w-100">
                @endif
                
                <!-- Project Content -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="content">
                            {!! $project->description !!}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Project Info Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>Project Information</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            @if($project->location)
                                <li class="mb-3">
                                    <strong><i class="bi bi-geo-alt text-primary me-2"></i>Location:</strong><br>
                                    <span class="text-muted">{{ $project->location }}</span>
                                </li>
                            @endif
                            
                            @if($project->donor)
                                <li class="mb-3">
                                    <strong><i class="bi bi-building text-primary me-2"></i>Donor:</strong><br>
                                    <span class="text-muted">{{ $project->donor }}</span>
                                </li>
                            @endif
                            
                            @if($project->budget)
                                <li class="mb-3">
                                    <strong><i class="bi bi-cash text-primary me-2"></i>Budget:</strong><br>
                                    <span class="text-muted">{{ $project->budget }}</span>
                                </li>
                            @endif
                            
                            @if($project->start_date)
                                <li class="mb-3">
                                    <strong><i class="bi bi-calendar text-primary me-2"></i>Duration:</strong><br>
                                    <span class="text-muted">
                                        {{ $project->start_date->format('M d, Y') }}
                                        @if($project->end_date)
                                            - {{ $project->end_date->format('M d, Y') }}
                                        @else
                                            - Ongoing
                                        @endif
                                    </span>
                                </li>
                            @endif
                            
                            <li class="mb-0">
                                <strong><i class="bi bi-check-circle text-primary me-2"></i>Status:</strong><br>
                                @if($project->end_date && $project->end_date->isPast())
                                    <span class="badge bg-secondary">Completed</span>
                                @else
                                    <span class="badge bg-success">Active</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Share -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h6><i class="bi bi-share me-2"></i>Share this project</h6>
                        <div class="d-flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($project->title) }}" target="_blank" class="btn btn-outline-info btn-sm">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($project->title) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Back Button -->
                <a href="{{ route('projects.index') }}" class="btn btn-outline-primary w-100">
                    <i class="bi bi-arrow-left me-2"></i>Back to Projects
                </a>
            </div>
        </div>
        
        <!-- Related Projects -->
        @if($relatedProjects->count() > 0)
            <div class="mt-5">
                <h3 class="section-title">Related Projects</h3>
                <div class="row">
                    @foreach($relatedProjects as $related)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if($related->image && file_exists(public_path($related->image)))
                                    <img src="{{ asset($related->image) }}" class="card-img-top" alt="{{ $related->title }}">
                                @else
                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                        <i class="bi bi-folder fs-1 text-muted"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $related->title }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($related->short_description, 80) }}</p>
                                    <a href="{{ route('projects.show', $related->slug) }}" class="btn btn-sm btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
