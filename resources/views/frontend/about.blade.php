@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>About Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">About Us</li>
            </ol>
        </nav>
    </div>
</div>

<!-- About Content -->
<section class="py-5">
    <div class="container">
        @if($aboutUs)
            <div class="row mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    @if($aboutUs->image)
                        <img src="{{ asset($aboutUs->image) }}" alt="About UMUS" class="img-fluid rounded-3 shadow">
                    @else
                        <div class="bg-light rounded-3 p-5 text-center" style="height: 400px; display: flex; align-items: center; justify-content: center;">
                            <div>
                                <i class="bi bi-building fs-1 text-muted"></i>
                                <p class="text-muted mt-2">UMUS Organization</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title">{{ $aboutUs->title ?? 'About UMUS' }}</h2>
                    <div class="content">
                        {!! $aboutUs->description !!}
                    </div>
                </div>
            </div>
        @endif
        
        <!-- Mission & Vision -->
        <div class="row mb-5">
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-circle p-3 me-3" style="background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));">
                                <i class="bi bi-bullseye text-white fs-3"></i>
                            </div>
                            <h3 class="mb-0">Our Mission</h3>
                        </div>
                        @if($aboutUs && $aboutUs->mission)
                            <div class="content">{!! $aboutUs->mission !!}</div>
                        @else
                            <p>To empower marginalized women and Dalit communities through education, skill development, advocacy, and sustainable livelihood programs. We strive to create an inclusive society where every individual has equal opportunities to thrive.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-circle p-3 me-3" style="background: linear-gradient(135deg, var(--secondary-color), var(--secondary-light));">
                                <i class="bi bi-eye text-white fs-3"></i>
                            </div>
                            <h3 class="mb-0">Our Vision</h3>
                        </div>
                        @if($aboutUs && $aboutUs->vision)
                            <div class="content">{!! $aboutUs->vision !!}</div>
                        @else
                            <p>A society free from discrimination, where women and marginalized communities enjoy equal rights, dignity, and opportunities for sustainable development. A just and equitable society where every voice matters.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- History -->
        @if($aboutUs && $aboutUs->history)
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card border-0 shadow">
                        <div class="card-body p-4">
                            <h3 class="section-title"><i class="bi bi-clock-history me-2"></i>Our History</h3>
                            <div class="content">{!! $aboutUs->history !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Team Section -->
@if($teamMembers->count() > 0)
    <section class="py-5 bg-light-custom">
        <div class="container">
            <h2 class="section-title text-center">Our Team</h2>
            <p class="text-center text-muted mb-5">Meet the dedicated people behind UMUS</p>
            
            <div class="row justify-content-center">
                @foreach($teamMembers as $member)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100 text-center border-0 shadow-sm">
                            <div class="card-body p-4">
                                @if($member->image && file_exists(public_path($member->image)))
                                    <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-primary mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                                        <i class="bi bi-person text-white fs-1"></i>
                                    </div>
                                @endif
                                <h5 class="card-title mb-1">{{ $member->name }}</h5>
                                <p class="text-secondary-custom small mb-2">{{ $member->designation }}</p>
                                @if($member->email)
                                    <p class="small mb-0"><i class="bi bi-envelope me-1"></i>{{ $member->email }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('team') }}" class="btn btn-primary">View Full Team</a>
            </div>
        </div>
    </section>
@endif

<!-- Call to Action -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
    <div class="container text-center text-white">
        <h2 class="mb-3">Join Our Mission</h2>
        <p class="lead mb-4">Together we can create lasting impact in the lives of marginalized communities.</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Get in Touch</a>
    </div>
</section>
@endsection
