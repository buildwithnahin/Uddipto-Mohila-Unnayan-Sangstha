@extends('layouts.admin')

@section('title', 'View Message')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>View Message</h1>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left me-1"></i>Back
    </a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="form-card">
            <div class="mb-4">
                <h5 class="text-muted mb-2">Subject</h5>
                <h4>{{ $message->subject }}</h4>
            </div>
            
            <hr>
            
            <div class="mb-4">
                <h5 class="text-muted mb-2">Message</h5>
                <p class="lead">{{ $message->message }}</p>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="form-card">
            <h5 class="mb-3"><i class="bi bi-person me-2"></i>Sender Details</h5>
            
            <ul class="list-unstyled">
                <li class="mb-3">
                    <strong>Name:</strong><br>
                    {{ $message->name }}
                </li>
                <li class="mb-3">
                    <strong>Email:</strong><br>
                    <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                </li>
                @if($message->phone)
                    <li class="mb-3">
                        <strong>Phone:</strong><br>
                        <a href="tel:{{ $message->phone }}">{{ $message->phone }}</a>
                    </li>
                @endif
                <li class="mb-3">
                    <strong>Received:</strong><br>
                    {{ $message->created_at->format('M d, Y \a\t H:i') }}
                </li>
                <li>
                    <strong>Status:</strong><br>
                    @if($message->is_read)
                        <span class="badge bg-secondary">Read</span>
                    @else
                        <span class="badge bg-warning text-dark">Unread</span>
                    @endif
                </li>
            </ul>
            
            <hr>
            
            <div class="d-flex gap-2">
                <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn btn-primary flex-grow-1">
                    <i class="bi bi-reply me-1"></i>Reply
                </a>
                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
