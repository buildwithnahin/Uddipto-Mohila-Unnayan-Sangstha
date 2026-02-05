@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Dashboard</h1>
    <span class="text-muted">Welcome back!</span>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-4 col-lg-2 mb-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="icon bg-primary">
                    <i class="bi bi-folder"></i>
                </div>
                <div class="ms-3">
                    <h3 class="mb-0">{{ $stats['projects'] }}</h3>
                    <small class="text-muted">Projects</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2 mb-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="icon bg-success">
                    <i class="bi bi-newspaper"></i>
                </div>
                <div class="ms-3">
                    <h3 class="mb-0">{{ $stats['news'] }}</h3>
                    <small class="text-muted">News</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2 mb-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="icon bg-info">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ms-3">
                    <h3 class="mb-0">{{ $stats['team_members'] }}</h3>
                    <small class="text-muted">Team</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2 mb-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="icon bg-purple">
                    <i class="bi bi-image"></i>
                </div>
                <div class="ms-3">
                    <h3 class="mb-0">{{ $stats['galleries'] }}</h3>
                    <small class="text-muted">Gallery</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2 mb-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="icon bg-warning">
                    <i class="bi bi-envelope"></i>
                </div>
                <div class="ms-3">
                    <h3 class="mb-0">{{ $stats['unread_messages'] }}</h3>
                    <small class="text-muted">Unread</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2 mb-3">
        <div class="stat-card">
            <div class="d-flex align-items-center">
                <div class="icon bg-info">
                    <i class="bi bi-chat-dots"></i>
                </div>
                <div class="ms-3">
                    <h3 class="mb-0">{{ $stats['total_messages'] }}</h3>
                    <small class="text-muted">Messages</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Messages -->
    <div class="col-lg-6 mb-4">
        <div class="table-card">
            <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-envelope me-2"></i>Recent Messages</h5>
                <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentMessages as $message)
                            <tr>
                                <td>
                                    @if(!$message->is_read)
                                        <span class="badge bg-warning me-1">New</span>
                                    @endif
                                    {{ $message->name }}
                                </td>
                                <td>{{ Str::limit($message->subject, 30) }}</td>
                                <td>{{ $message->created_at->format('M d') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No messages yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Recent News -->
    <div class="col-lg-6 mb-4">
        <div class="table-card">
            <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-newspaper me-2"></i>Recent News</h5>
                <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentNews as $news)
                            <tr>
                                <td>{{ Str::limit($news->title, 35) }}</td>
                                <td>
                                    @if($news->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $news->created_at->format('M d') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">No news yet</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row">
    <div class="col-12">
        <div class="stat-card">
            <h5 class="mb-3"><i class="bi bi-lightning me-2"></i>Quick Actions</h5>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i>Add Project
                </a>
                <a href="{{ route('admin.news.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle me-1"></i>Add News
                </a>
                <a href="{{ route('admin.team.create') }}" class="btn btn-info text-white">
                    <i class="bi bi-plus-circle me-1"></i>Add Team Member
                </a>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-secondary">
                    <i class="bi bi-plus-circle me-1"></i>Add Gallery
                </a>
                <a href="{{ route('admin.sliders.create') }}" class="btn btn-warning">
                    <i class="bi bi-plus-circle me-1"></i>Add Slider
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
