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