@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Contact Messages</h1>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                    <tr class="{{ !$message->is_read ? 'table-warning' : '' }}">
                        <td>
                            @if(!$message->is_read)
                                <span class="badge bg-warning text-dark">New</span>
                            @else
                                <span class="badge bg-secondary">Read</span>
                            @endif
                        </td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ Str::limit($message->subject, 30) }}</td>
                        <td>{{ $message->created_at->format('M d, Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i>
                            </a>
                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No messages found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($messages->hasPages())
        <div class="p-3">
            {{ $messages->links() }}
        </div>
    @endif
</div>
@endsection
