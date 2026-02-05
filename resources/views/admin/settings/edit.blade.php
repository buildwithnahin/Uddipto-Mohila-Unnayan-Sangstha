@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <h1>Site Settings</h1>
</div>

<div class="form-card">
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-3 text-primary"><i class="bi bi-gear me-2"></i>General Settings</h5>
                
                <div class="mb-3">
                    <label for="site_name" class="form-label">Site Name</label>
                    <input type="text" class="form-control" id="site_name" name="site_name" value="{{ $settings['site_name'] ?? '' }}">
                </div>
                
                <div class="mb-3">
                    <label for="site_tagline" class="form-label">Tagline</label>
                    <input type="text" class="form-control" id="site_tagline" name="site_tagline" value="{{ $settings['site_tagline'] ?? '' }}">
                </div>
                
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                    @if(!empty($settings['logo']))
                        <div class="mt-2">
                            <img src="{{ asset($settings['logo']) }}" alt="Logo" style="max-height: 60px;">
                        </div>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label for="favicon" class="form-label">Favicon</label>
                    <input type="file" class="form-control" id="favicon" name="favicon" accept="image/*">
                </div>
                
                <hr>
                
                <h5 class="mb-3 text-primary"><i class="bi bi-telephone me-2"></i>Contact Information</h5>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Primary Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $settings['email'] ?? '' }}">
                </div>
                
                <div class="mb-3">
                    <label for="email_secondary" class="form-label">Secondary Email</label>
                    <input type="email" class="form-control" id="email_secondary" name="email_secondary" value="{{ $settings['email_secondary'] ?? '' }}">
                </div>
                
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $settings['phone'] ?? '' }}">
                </div>
                
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="2">{{ $settings['address'] ?? '' }}</textarea>
                </div>
            </div>
            
            <div class="col-md-6">
                <h5 class="mb-3 text-primary"><i class="bi bi-share me-2"></i>Social Media</h5>
                
                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook URL</label>
                    <input type="url" class="form-control" id="facebook" name="facebook" value="{{ $settings['facebook'] ?? '' }}" placeholder="https://facebook.com/...">
                </div>
                
                <div class="mb-3">
                    <label for="twitter" class="form-label">Twitter URL</label>
                    <input type="url" class="form-control" id="twitter" name="twitter" value="{{ $settings['twitter'] ?? '' }}" placeholder="https://twitter.com/...">
                </div>
                
                <div class="mb-3">
                    <label for="youtube" class="form-label">YouTube URL</label>
                    <input type="url" class="form-control" id="youtube" name="youtube" value="{{ $settings['youtube'] ?? '' }}" placeholder="https://youtube.com/...">
                </div>
                
                <hr>
                
                <h5 class="mb-3 text-primary"><i class="bi bi-search me-2"></i>SEO Settings</h5>
                
                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ $settings['meta_description'] ?? '' }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ $settings['meta_keywords'] ?? '' }}">
                </div>
                
                <hr>
                
                <h5 class="mb-3 text-primary"><i class="bi bi-layout-text-sidebar me-2"></i>Footer</h5>
                
                <div class="mb-3">
                    <label for="footer_text" class="form-label">Footer Copyright Text</label>
                    <input type="text" class="form-control" id="footer_text" name="footer_text" value="{{ $settings['footer_text'] ?? '' }}">
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle me-1"></i>Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
