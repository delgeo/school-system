<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboards
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth');
Route::get('/school/dashboard', [SchoolController::class, 'dashboard'])->middleware('auth');
Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->middleware('auth');

// Show edit form
Route::get('/admin/schools/{id}/edit', [AdminController::class, 'editSchool'])
    ->name('admin.schools.edit');

// Update school
Route::put('/admin/schools/{id}', [AdminController::class, 'updateSchool'])
    ->name('admin.schools.update');

// Toggle school status
Route::post('/admin/schools/{id}/toggle', [AdminController::class, 'toggleSchool'])
    ->name('admin.schools.toggle');

// Store School
Route::post('/admin/schools', [AdminController::class, 'storeSchool'])
    ->name('admin.schools.store');