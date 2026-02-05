@extends('layouts.frontend')

@section('title', 'Projects')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>Our Projects</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Projects</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Projects List -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @forelse($projects as $project)
                <div class="col-md-4 mb-4 fade-in">
                    <div class="card h-100">
                        @if($project->image && file_exists(public_path($project->image)))
                            <img src="{{ asset($project->image) }}" class="card-img-top" alt="{{ $project->title }}">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-folder fs-1 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            @if($project->is_featured)
                                <span class="badge bg-warning text-dark mb-2">Featured</span>
                            @endif
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($project->short_description, 120) }}</p>
                            
                            @if($project->location)
                                <p class="mb-1 small"><i class="bi bi-geo-alt text-primary me-1"></i>{{ $project->location }}</p>
                            @endif
                            @if($project->donor)
                                <p class="mb-1 small"><i class="bi bi-building text-primary me-1"></i>{{ $project->donor }}</p>
                            @endif
                            @if($project->start_date)
                                <p class="mb-2 small">
                                    <i class="bi bi-calendar text-primary me-1"></i>
                                    {{ $project->start_date->format('M Y') }}
                                    @if($project->end_date)
                                        - {{ $project->end_date->format('M Y') }}
                                    @else
                                        - Ongoing
                                    @endif
                                </p>
                            @endif
                            
                            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-sm btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle me-2"></i>No projects available at the moment.
                    </div>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($projects->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
