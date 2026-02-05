@extends('layouts.frontend')

@section('title', 'Our Team')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>Our Team</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Team</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Team Members -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title d-inline-block">Meet Our Team</h2>
            <p class="text-muted mt-3">Dedicated professionals working towards a common goal of women empowerment and community development</p>
        </div>
        
        <div class="row justify-content-center">
            @forelse($teamMembers as $member)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 text-center border-0 shadow">
                        <div class="card-body p-4">
                            @if($member->image && file_exists(public_path($member->image)))
                                <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" class="rounded-circle mb-3 shadow" style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-primary mx-auto mb-3 d-flex align-items-center justify-content-center shadow" style="width: 150px; height: 150px;">
                                    <i class="bi bi-person text-white" style="font-size: 4rem;"></i>
                                </div>
                            @endif
                            <h5 class="card-title mb-1">{{ $member->name }}</h5>
                            <p class="text-secondary-custom fw-medium mb-3">{{ $member->designation }}</p>
                            
                            @if($member->bio)
                                <p class="text-muted small mb-3">{{ Str::limit($member->bio, 100) }}</p>
                            @endif
                            
                            <div class="d-flex justify-content-center gap-2">
                                @if($member->email)
                                    <a href="mailto:{{ $member->email }}" class="btn btn-sm btn-outline-primary" title="Email">
                                        <i class="bi bi-envelope"></i>
                                    </a>
                                @endif
                                @if($member->phone)
                                    <a href="tel:{{ $member->phone }}" class="btn btn-sm btn-outline-primary" title="Phone">
                                        <i class="bi bi-telephone"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle me-2"></i>Team information will be updated soon.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Join Team CTA -->
<section class="py-5 bg-light-custom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3>Want to Join Our Team?</h3>
                <p class="text-muted mb-0">We're always looking for passionate individuals who want to make a difference in the lives of marginalized communities.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
            </div>
        </div>
    </div>
</section>
@endsection
