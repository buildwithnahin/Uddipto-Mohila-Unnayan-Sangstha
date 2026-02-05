@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
<!-- Hero Slider -->
<section id="heroSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($sliders as $index => $slider)
            <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @forelse($sliders as $index => $slider)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                @if($slider->image && file_exists(public_path($slider->image)))
                    <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="{{ $slider->title }}">
                @else
                    <div class="d-block w-100 bg-primary d-flex align-items-center justify-content-center" style="height: 500px;">
                        <div class="text-center text-white">
                            <h2>{{ $slider->title }}</h2>
                            <p>{{ $slider->description }}</p>
                        </div>
                    </div>
                @endif
                @if($slider->title || $slider->description)
                    <div class="carousel-caption d-none d-md-block">
                        @if($slider->title)
                            <h2>{{ $slider->title }}</h2>
                        @endif
                        @if($slider->description)
                            <p>{{ $slider->description }}</p>
                        @endif
                        @if($slider->button_text && $slider->button_link)
                            <a href="{{ $slider->button_link }}" class="btn btn-primary mt-2">{{ $slider->button_text }}</a>
                        @endif
                    </div>
                @endif
            </div>
        @empty
            <div class="carousel-item active">
                <div class="hero-section d-flex align-items-center" style="height: 500px;">
                    <div class="container text-center">
                        <h1 class="display-4 fw-bold mb-4">Empowering Women, Transforming Communities</h1>
                        <p class="lead mb-4">UMUS is dedicated to empowering marginalized women and Dalit communities in Satkhira, Bangladesh since 2003.</p>
                        <a href="{{ route('about') }}" class="btn btn-light btn-lg me-2">Learn More</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">Contact Us</a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
    @if($sliders->count() > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    @endif
</section>

<!-- About Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                @if($aboutUs && $aboutUs->image)
                    <img src="{{ asset($aboutUs->image) }}" alt="About UMUS" class="img-fluid rounded-3 shadow">
                @else
                    <div class="bg-light rounded-3 p-5 text-center" style="height: 350px; display: flex; align-items: center; justify-content: center;">
                        <div>
                            <i class="bi bi-building fs-1 text-muted"></i>
                            <p class="text-muted mt-2">UMUS Organization</p>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">About UMUS</h2>
                @if($aboutUs)
                    <div class="mb-4">
                        {!! Str::limit(strip_tags($aboutUs->description), 400) !!}
                    </div>
                @else
                    <p>Uddipto Mohila Unnayan Sangstha (UMUS) is a non-profit organization dedicated to empowering marginalized women and Dalit communities in Satkhira, Bangladesh since 2003.</p>
                @endif
                <a href="{{ route('about') }}" class="btn btn-primary">Read More <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-5 bg-light-custom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle p-3 me-3" style="background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));">
                                <i class="bi bi-bullseye text-white fs-4"></i>
                            </div>
                            <h4 class="mb-0">Our Mission</h4>
                        </div>
                        @if($aboutUs && $aboutUs->mission)
                            <div>{!! Str::limit(strip_tags($aboutUs->mission), 250) !!}</div>
                        @else
                            <p>To empower marginalized women and Dalit communities through education, skill development, advocacy, and sustainable livelihood programs.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle p-3 me-3" style="background: linear-gradient(135deg, var(--secondary-color), var(--secondary-light));">
                                <i class="bi bi-eye text-white fs-4"></i>
                            </div>
                            <h4 class="mb-0">Our Vision</h4>
                        </div>
                        @if($aboutUs && $aboutUs->vision)
                            <div>{!! Str::limit(strip_tags($aboutUs->vision), 250) !!}</div>
                        @else
                            <p>A society free from discrimination, where women and marginalized communities enjoy equal rights, dignity, and opportunities for sustainable development.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Our Projects</h2>
            <a href="{{ route('projects.index') }}" class="btn btn-outline-primary">View All <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
        <div class="row">
            @forelse($featuredProjects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($project->image && file_exists(public_path($project->image)))
                            <img src="{{ asset($project->image) }}" class="card-img-top" alt="{{ $project->title }}">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-folder fs-1 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($project->short_description, 100) }}</p>
                            @if($project->location)
                                <p class="mb-2 small"><i class="bi bi-geo-alt text-primary me-1"></i>{{ $project->location }}</p>
                            @endif
                            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-sm btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">No projects available at the moment.</div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Latest News -->
<section class="py-5 bg-light-custom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Latest News</h2>
            <a href="{{ route('news.index') }}" class="btn btn-outline-primary">View All <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
        <div class="row">
            @forelse($latestNews as $article)
                <div class="col-md-4 mb-4">
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
                                <p class="text-muted small mb-2"><i class="bi bi-calendar me-1"></i>{{ $article->published_date->format('M d, Y') }}</p>
                            @endif
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($article->short_description, 100) }}</p>
                            <a href="{{ route('news.show', $article->slug) }}" class="btn btn-sm btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">No news available at the moment.</div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
    <div class="container text-center text-white">
        <h2 class="mb-3">Want to Make a Difference?</h2>
        <p class="lead mb-4">Partner with UMUS to create lasting impact in the lives of marginalized communities.</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contact Us Today</a>
    </div>
</section>
@endsection
