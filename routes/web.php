<?php

use App\Http\Controllers\Admin\AdminActivityController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminContentController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminRegistrationController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PageController::class, 'index'])->name('home');
Route::post('/daftar', [RegistrationController::class, 'store'])->name('registration.store');

// Admin Auth Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Protected Dashboard Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Settings Management (Text, Info, Photos, Addresses, Contacts)
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');

    // Online Registrations Management
    Route::get('/registrations', [AdminRegistrationController::class, 'index'])->name('registrations.index');
    Route::patch('/registrations/{registration}/status', [AdminRegistrationController::class, 'updateStatus'])->name('registrations.update-status');
    Route::delete('/registrations/{registration}', [AdminRegistrationController::class, 'destroy'])->name('registrations.destroy');

    // Activities Management
    Route::get('/activities', [AdminContentController::class, 'activities'])->name('activities.index');
    Route::post('/activities', [AdminContentController::class, 'storeActivity'])->name('activities.store');
    Route::put('/activities/{activity}', [AdminContentController::class, 'updateActivity'])->name('activities.update');
    Route::delete('/activities/{activity}', [AdminContentController::class, 'destroyActivity'])->name('activities.destroy');

    // Facilities Management
    Route::get('/facilities', [AdminContentController::class, 'facilities'])->name('facilities.index');
    Route::post('/facilities', [AdminContentController::class, 'storeFacility'])->name('facilities.store');
    Route::put('/facilities/{facility}', [AdminContentController::class, 'updateFacility'])->name('facilities.update');
    Route::delete('/facilities/{facility}', [AdminContentController::class, 'destroyFacility'])->name('facilities.destroy');
});
