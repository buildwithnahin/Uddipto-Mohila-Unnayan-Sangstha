@extends('layouts.frontend')

@section('title', 'Gallery')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>Gallery</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Gallery</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Gallery -->
<section class="py-5">
    <div class="container">
        <!-- Category Filter -->
        @if($categories->count() > 0)
            <div class="mb-4 text-center">
                <button class="btn btn-primary me-2 filter-btn active" data-filter="all">All</button>
                @foreach($categories as $category)
                    <button class="btn btn-outline-primary me-2 filter-btn" data-filter="{{ Str::slug($category) }}">{{ $category }}</button>
                @endforeach
            </div>
        @endif
        
        <!-- Gallery Grid -->
        <div class="row" id="gallery-grid">
            @forelse($galleries as $gallery)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 gallery-item" data-category="{{ Str::slug($gallery->category ?? 'uncategorized') }}">
                    <div class="card h-100 border-0 shadow-sm">
                        <a href="{{ asset($gallery->image) }}" data-bs-toggle="modal" data-bs-target="#galleryModal" data-image="{{ asset($gallery->image) }}" data-title="{{ $gallery->title }}" data-description="{{ $gallery->description }}">
                            @if($gallery->image && file_exists(public_path($gallery->image)))
                                <img src="{{ asset($gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="bi bi-image fs-1 text-muted"></i>
                                </div>
                            @endif
                        </a>
                        <div class="card-body py-3">
                            <h6 class="card-title mb-1">{{ $gallery->title }}</h6>
                            @if($gallery->category)
                                <small class="text-muted"><i class="bi bi-folder me-1"></i>{{ $gallery->category }}</small>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle me-2"></i>No gallery images available at the moment.
                    </div>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($galleries->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>
</section>

<!-- Gallery Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-0">
                <img src="" id="modalImage" class="img-fluid" alt="">
            </div>
            <div class="modal-footer">
                <p class="mb-0 text-muted" id="modalDescription"></p>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Gallery Modal
    document.querySelectorAll('[data-bs-target="#galleryModal"]').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            document.getElementById('modalImage').src = item.dataset.image;
            document.getElementById('modalTitle').textContent = item.dataset.title;
            document.getElementById('modalDescription').textContent = item.dataset.description || '';
        });
    });
    
    // Category Filter
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Update active button
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active', 'btn-primary'));
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.add('btn-outline-primary'));
            this.classList.add('active', 'btn-primary');
            this.classList.remove('btn-outline-primary');
            
            // Filter items
            document.querySelectorAll('.gallery-item').forEach(item => {
                if (filter === 'all' || item.dataset.category === filter) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush
@endsection
