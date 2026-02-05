<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - UMUS Admin</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #1a5276;
            --primary-dark: #154360;
            --secondary-color: #7d3c98;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, var(--primary-dark) 0%, #0d2840 100%);
            color: white;
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s ease;
        }
        
        .sidebar-brand {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-brand h4 {
            margin: 0;
            font-weight: 700;
        }
        
        .sidebar-nav {
            padding: 20px 0;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: white;
            background-color: rgba(255,255,255,0.1);
            border-left-color: var(--secondary-color);
        }
        
        .nav-link i {
            font-size: 1.1rem;
            width: 24px;
        }
        
        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }
        
        /* Top Navbar */
        .top-navbar {
            background: white;
            padding: 15px 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .content-wrapper {
            padding: 25px;
        }
        
        /* Cards */
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .stat-card .icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }
        
        .stat-card .icon.bg-primary { background: linear-gradient(135deg, #1a5276, #154360); }
        .stat-card .icon.bg-success { background: linear-gradient(135deg, #27ae60, #1e8449); }
        .stat-card .icon.bg-warning { background: linear-gradient(135deg, #f39c12, #d68910); }
        .stat-card .icon.bg-info { background: linear-gradient(135deg, #3498db, #2980b9); }
        .stat-card .icon.bg-purple { background: linear-gradient(135deg, #7d3c98, #5b2c6f); }
        
        /* Page Header */
        .page-header {
            margin-bottom: 25px;
        }
        
        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 600;
            margin: 0;
        }
        
        /* Table */
        .table-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .table-card .table {
            margin: 0;
        }
        
        .table-card .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            border: none;
        }
        
        .table-card .table td {
            vertical-align: middle;
        }
        
        /* Form Styles */
        .form-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(26, 82, 118, 0.25);
        }
        
        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            border: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
        }
        
        /* Badge */
        .badge-status {
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
        }
        
        /* Responsive */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('uploads/settings/logo.png') }}" alt="UMUS" height="60" class="mb-2" style="filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));">
            <h5 class="mb-0">UMUS Admin</h5>
            <small class="text-white-50">Control Panel</small>
        </div>
        
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ request()->routeIs('admin.sliders*') ? 'active' : '' }}">
                <i class="bi bi-images"></i>
                <span>Sliders</span>
            </a>
            <a href="{{ route('admin.about.edit') }}" class="nav-link {{ request()->routeIs('admin.about*') ? 'active' : '' }}">
                <i class="bi bi-info-circle"></i>
                <span>About Us</span>
            </a>
            <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                <i class="bi bi-folder"></i>
                <span>Projects</span>
            </a>
            <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i>
                <span>News & Events</span>
            </a>
            <a href="{{ route('admin.team.index') }}" class="nav-link {{ request()->routeIs('admin.team*') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                <span>Team Members</span>
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery*') ? 'active' : '' }}">
                <i class="bi bi-image"></i>
                <span>Gallery</span>
            </a>
            <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                <i class="bi bi-envelope"></i>
                <span>Messages</span>
                @php
                    $unreadCount = \App\Models\ContactMessage::unread()->count();
                @endphp
                @if($unreadCount > 0)
                    <span class="badge bg-danger ms-auto">{{ $unreadCount }}</span>
                @endif
            </a>
            <a href="{{ route('admin.settings.edit') }}" class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
            
            <hr class="my-3 mx-3 bg-white-50">
            
            <a href="{{ route('home') }}" class="nav-link" target="_blank">
                <i class="bi bi-globe"></i>
                <span>View Website</span>
            </a>
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="nav-link w-100 border-0 bg-transparent text-start">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </button>
            </form>
        </nav>
    </aside>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar">
            <button class="btn btn-link d-lg-none p-0" onclick="document.getElementById('sidebar').classList.toggle('show')">
                <i class="bi bi-list fs-4"></i>
            </button>
            <h5 class="mb-0 d-none d-lg-block">Welcome, {{ auth()->guard('admin')->user()->name }}</h5>
            <div class="dropdown">
                <button class="btn btn-link dropdown-toggle text-dark text-decoration-none" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-1"></i>
                    {{ auth()->guard('admin')->user()->username }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.settings.edit') }}">
                            <i class="bi bi-gear me-2"></i>Settings
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-left me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    
    <script>
        // Initialize TinyMCE for all textareas with class 'tinymce'
        tinymce.init({
            selector: 'textarea.tinymce',
            height: 400,
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            menubar: false,
            branding: false
        });
    </script>
    
    @stack('scripts')
</body>
</html>
