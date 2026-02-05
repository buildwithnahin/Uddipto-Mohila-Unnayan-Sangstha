@extends('layouts.frontend')

@section('title', 'Contact Us')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>Contact Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Contact</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Info -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="card border-0 shadow h-100">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Get in Touch</h4>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle p-3" style="background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));">
                                    <i class="bi bi-geo-alt text-white"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Address</h6>
                                <p class="text-muted mb-0">{{ $settings['address'] ?? 'Mukttizudda College (West Side), Tala, Satkhira, Bangladesh' }}</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle p-3" style="background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));">
                                    <i class="bi bi-telephone text-white"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Phone</h6>
                                <p class="text-muted mb-0">{{ $settings['phone'] ?? '+880 1745953020' }}</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="rounded-circle p-3" style="background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));">
                                    <i class="bi bi-envelope text-white"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Email</h6>
                                <p class="text-muted mb-0">{{ $settings['email'] ?? 'uddipto.org@gmail.com' }}</p>
                                @if(!empty($settings['email_secondary']))
                                    <p class="text-muted mb-0">{{ $settings['email_secondary'] }}</p>
                                @endif
                            </div>
                        </div>
                        
                        <hr>
                        
                        <h6>Follow Us</h6>
                        <div class="d-flex gap-2">
                            @if(!empty($settings['facebook']))
                                <a href="{{ $settings['facebook'] }}" target="_blank" class="btn btn-outline-primary">
                                    <i class="bi bi-facebook"></i>
                                </a>
                            @endif
                            @if(!empty($settings['twitter']))
                                <a href="{{ $settings['twitter'] }}" target="_blank" class="btn btn-outline-info">
                                    <i class="bi bi-twitter"></i>
                                </a>
                            @endif
                            @if(!empty($settings['youtube']))
                                <a href="{{ $settings['youtube'] }}" target="_blank" class="btn btn-outline-danger">
                                    <i class="bi bi-youtube"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Send us a Message</h4>
                        
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Your Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" required>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Your Message <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send me-2"></i>Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Placeholder) -->
<section class="py-5 bg-light-custom">
    <div class="container">
        <h4 class="text-center mb-4">Our Location</h4>
        <div class="ratio ratio-21x9 rounded-3 overflow-hidden shadow">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58890.83755831847!2d89.0453!3d22.5744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fee8c02c8e4d1f%3A0x5c68a27c5bd5a3f0!2sTala%2C%20Bangladesh!5e0!3m2!1sen!2s!4v1706890000000!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
@endsection
