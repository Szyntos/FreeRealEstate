<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{property_id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');


    // Contact form routes
    Route::get('/contact_forms/create', [ContactFormController::class, 'create'])->name('contact_forms.create');
    Route::post('/contact_forms', [ContactFormController::class, 'store'])->name('contact_forms.store');
});

// Property routes for public viewing
Route::resource('properties', PropertyController::class)->only(['index', 'show']);

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'adminDashboard'])->name('admin.index');

    // Admin property routes
    Route::get('/admin/properties', [PropertyController::class, 'adminIndex'])->name('admin.properties.index');
    Route::get('/admin/properties/create', [PropertyController::class, 'create'])->name('admin.properties.create');
    Route::post('/admin/properties', [PropertyController::class, 'store'])->name('admin.properties.store');
    Route::get('/admin/properties/{property}/edit', [PropertyController::class, 'edit'])->name('admin.properties.edit');
    Route::put('/admin/properties/{property}', [PropertyController::class, 'update'])->name('admin.properties.update');
    Route::delete('/admin/properties/{property}', [PropertyController::class, 'destroy'])->name('admin.properties.destroy');

    // Admin contact form routes
    Route::get('/admin/contact_forms', [ContactFormController::class, 'index'])->name('admin.contact_forms.index');
    Route::get('/admin/contact_forms/{contact_form}', [ContactFormController::class, 'show'])->name('admin.contact_forms.show');
    Route::delete('/admin/contact_forms/{contact_form}', [ContactFormController::class, 'destroy'])->name('admin.contact_forms.destroy');

    // Admin user management routes
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});
