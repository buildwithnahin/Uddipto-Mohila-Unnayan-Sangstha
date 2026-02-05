<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ContactMessageController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/team', [TeamController::class, 'index'])->name('team');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Admin Auth Routes (Guest only)
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

// Admin Protected Routes
Route::prefix('admin')->middleware('admin')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // About Us
    Route::get('/about', [AboutUsController::class, 'edit'])->name('admin.about.edit');
    Route::put('/about', [AboutUsController::class, 'update'])->name('admin.about.update');
    
    // Projects
    Route::get('/projects', [AdminProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/projects/create', [AdminProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [AdminProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{project}', [AdminProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{project}', [AdminProjectController::class, 'destroy'])->name('admin.projects.destroy');
    
    // News
    Route::get('/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
    Route::get('/news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
    Route::post('/news', [AdminNewsController::class, 'store'])->name('admin.news.store');
    Route::get('/news/{news}/edit', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/news/{news}', [AdminNewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/news/{news}', [AdminNewsController::class, 'destroy'])->name('admin.news.destroy');
    
    // Team Members
    Route::get('/team', [TeamMemberController::class, 'index'])->name('admin.team.index');
    Route::get('/team/create', [TeamMemberController::class, 'create'])->name('admin.team.create');
    Route::post('/team', [TeamMemberController::class, 'store'])->name('admin.team.store');
    Route::get('/team/{teamMember}/edit', [TeamMemberController::class, 'edit'])->name('admin.team.edit');
    Route::put('/team/{teamMember}', [TeamMemberController::class, 'update'])->name('admin.team.update');
    Route::delete('/team/{teamMember}', [TeamMemberController::class, 'destroy'])->name('admin.team.destroy');
    
    // Gallery
    Route::get('/gallery', [AdminGalleryController::class, 'index'])->name('admin.gallery.index');
    Route::get('/gallery/create', [AdminGalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/gallery', [AdminGalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/gallery/{gallery}/edit', [AdminGalleryController::class, 'edit'])->name('admin.gallery.edit');
    Route::put('/gallery/{gallery}', [AdminGalleryController::class, 'update'])->name('admin.gallery.update');
    Route::delete('/gallery/{gallery}', [AdminGalleryController::class, 'destroy'])->name('admin.gallery.destroy');
    
    // Sliders
    Route::get('/sliders', [SliderController::class, 'index'])->name('admin.sliders.index');
    Route::get('/sliders/create', [SliderController::class, 'create'])->name('admin.sliders.create');
    Route::post('/sliders', [SliderController::class, 'store'])->name('admin.sliders.store');
    Route::get('/sliders/{slider}/edit', [SliderController::class, 'edit'])->name('admin.sliders.edit');
    Route::put('/sliders/{slider}', [SliderController::class, 'update'])->name('admin.sliders.update');
    Route::delete('/sliders/{slider}', [SliderController::class, 'destroy'])->name('admin.sliders.destroy');
    
    // Settings
    Route::get('/settings', [SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('admin.settings.update');
    
    // Contact Messages
    Route::get('/messages', [ContactMessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/messages/{message}', [ContactMessageController::class, 'show'])->name('admin.messages.show');
    Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('admin.messages.destroy');
});
