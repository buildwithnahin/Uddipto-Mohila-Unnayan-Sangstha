@extends('layouts.admin')

@section('title', 'Team Members')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Team Members</h1>
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i>Add Member
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teamMembers as $member)
                    <tr>
                        <td>
                            @if($member->image && file_exists(public_path($member->image)))
                                <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                            @else
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="bi bi-person text-white"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->designation }}</td>
                        <td>{{ $member->order }}</td>
                        <td>
                            @if($member->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.team.destroy', $member) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
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
                        <td colspan="6" class="text-center py-4 text-muted">No team members found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    @if($teamMembers->hasPages())
        <div class="p-3">
            {{ $teamMembers->links() }}
        </div>
    @endif
</div>
@endsection
