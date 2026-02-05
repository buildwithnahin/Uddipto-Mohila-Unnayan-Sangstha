<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $settings['meta_description'] ?? 'UMUS - Uddipto Mohila Unnayan Sangstha' }}">
    <meta name="keywords" content="{{ $settings['meta_keywords'] ?? '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'UMUS') - {{ $settings['site_name'] ?? 'Uddipto Mohila Unnayan Sangstha' }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #1a5276;
            --primary-dark: #154360;
            --secondary-color: #7d3c98;
            --secondary-light: #9b59b6;
            --accent-color: #f4d03f;
            --light-bg: #f8f9fa;
            --dark-text: #2c3e50;
            --gray-text: #6c757d;
        }
        
        body {
            font-family: 'Open Sans', sans-serif;
            color: var(--dark-text);
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        
        /* Navbar Styles */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .navbar-nav .nav-link {
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            background-color: rgba(255,255,255,0.1);
            border-radius: 5px;
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 80px 0;
        }
        
        /* Section Styles */
        .section-title {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 15px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }
        
        .section-title.text-center::after {
            left: 50%;
            transform: translateX(-50%);
        }
        
        /* Card Styles */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        
        .card-img-top {
            border-radius: 10px 10px 0 0;
            height: 200px;
            object-fit: cover;
        }
        
        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border: none;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 82, 118, 0.4);
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--secondary-light) 100%);
            border: none;
        }
        
        .btn-secondary:hover {
            background: linear-gradient(135deg, var(--secondary-light) 0%, var(--secondary-color) 100%);
        }
        
        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        /* Footer Styles */
        footer {
            background: linear-gradient(135deg, var(--primary-dark) 0%, #0d2840 100%);
            color: white;
        }
        
        footer a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        footer a:hover {
            color: var(--accent-color);
        }
        
        footer h5 {
            color: var(--accent-color);
            font-size: 1.1rem;
            margin-bottom: 20px;
        }
        
        /* Top Bar */
        .top-bar {
            background-color: var(--primary-dark);
            color: rgba(255,255,255,0.9);
            font-size: 0.9rem;
            padding: 8px 0;
        }
        
        .top-bar a {
            color: rgba(255,255,255,0.9);
            text-decoration: none;
        }
        
        .top-bar a:hover {
            color: var(--accent-color);
        }
        
        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 60px 0;
            margin-bottom: 50px;
        }
        
        .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
        }
        
        .breadcrumb-item a {
            color: rgba(255,255,255,0.8);
        }
        
        .breadcrumb-item.active {
            color: white;
        }
        
        /* Utility Classes */
        .bg-light-custom {
            background-color: var(--light-bg);
        }
        
        .text-primary-custom {
            color: var(--primary-color) !important;
        }
        
        .text-secondary-custom {
            color: var(--secondary-color) !important;
        }
        
        /* Carousel */
        .carousel-caption {
            background: rgba(0,0,0,0.5);
            padding: 30px;
            border-radius: 10px;
        }
        
        .carousel-item {
            height: 500px;
        }
        
        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
        
        /* Animations */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .carousel-item {
                height: 350px;
            }
            
            .page-header {
                padding: 40px 0;
            }
            
            .page-header h1 {
                font-size: 1.8rem;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <span class="me-4"><i class="bi bi-envelope me-2"></i>{{ $settings['email'] ?? 'uddipto.org@gmail.com' }}</span>
                    <span><i class="bi bi-telephone me-2"></i>{{ $settings['phone'] ?? '+880 1745953020' }}</span>
                </div>
                <div class="col-md-4 text-end">
                    @if(!empty($settings['facebook']))
                        <a href="{{ $settings['facebook'] }}" target="_blank" class="me-3"><i class="bi bi-facebook"></i></a>
                    @endif
                    @if(!empty($settings['twitter']))
                        <a href="{{ $settings['twitter'] }}" target="_blank" class="me-3"><i class="bi bi-twitter"></i></a>
                    @endif
                    @if(!empty($settings['youtube']))
                        <a href="{{ $settings['youtube'] }}" target="_blank"><i class="bi bi-youtube"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset($settings['logo'] ?? 'uploads/settings/logo.png') }}" alt="UMUS" height="50" class="me-2">
                <span class="d-none d-md-inline">UMUS</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('projects*') ? 'active' : '' }}" href="{{ route('projects.index') }}">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('news*') ? 'active' : '' }}" href="{{ route('news.index') }}">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('team') ? 'active' : '' }}" href="{{ route('team') }}">Our Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact*') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
            <div class="container">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
            <div class="container">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>About UMUS</h5>
                    <p class="text-white-50">Uddipto Mohila Unnayan Sangstha (UMUS) is a non-profit organization dedicated to empowering marginalized women and Dalit communities in Satkhira, Bangladesh since 2003.</p>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}">Home</a></li>
                        <li class="mb-2"><a href="{{ route('about') }}">About Us</a></li>
                        <li class="mb-2"><a href="{{ route('projects.index') }}">Projects</a></li>
                        <li class="mb-2"><a href="{{ route('news.index') }}">News</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5>Contact Info</h5>
                    <ul class="list-unstyled text-white-50">
                        <li class="mb-2"><i class="bi bi-geo-alt me-2"></i>{{ $settings['address'] ?? 'Tala, Satkhira, Bangladesh' }}</li>
                        <li class="mb-2"><i class="bi bi-telephone me-2"></i>{{ $settings['phone'] ?? '+880 1745953020' }}</li>
                        <li class="mb-2"><i class="bi bi-envelope me-2"></i>{{ $settings['email'] ?? 'uddipto.org@gmail.com' }}</li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5>Follow Us</h5>
                    <div class="d-flex gap-3">
                        @if(!empty($settings['facebook']))
                            <a href="{{ $settings['facebook'] }}" target="_blank" class="fs-4"><i class="bi bi-facebook"></i></a>
                        @endif
                        @if(!empty($settings['twitter']))
                            <a href="{{ $settings['twitter'] }}" target="_blank" class="fs-4"><i class="bi bi-twitter"></i></a>
                        @endif
                        @if(!empty($settings['youtube']))
                            <a href="{{ $settings['youtube'] }}" target="_blank" class="fs-4"><i class="bi bi-youtube"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-white-50">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-white-50">{{ $settings['footer_text'] ?? '© 2003-2026 UMUS. All rights reserved.' }}</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0 text-white-50">Empowering Women, Transforming Communities</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>
