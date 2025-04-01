<?php

use App\Http\Controllers\Login_reg\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route đăng ký
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route đăng nhập
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route đăng xuất
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Các route dành cho người dùng đã đăng nhập
Route::middleware('auth')->group(function () {
    // Trang chủ dành cho người dùng đã đăng nhập
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Trang admin dành cho người dùng có quyền admin
    Route::middleware('isAdmin')->get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Route cho trang không tìm thấy (404)
Route::fallback(function () {
    return view('404'); // Trang lỗi 404
});
