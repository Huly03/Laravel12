<?php

use App\Http\Controllers\Login_reg\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;



// Route để hiển thị form upload ảnh
Route::get('/upload', [ApiController::class, 'showForm']); 

// Route xử lý ảnh upload và trả kết quả
Route::post('/upload', [ApiController::class, 'uploadImage'])->name('uploadImage');(env) PS D:\api_base_public-main\CNN> 
Route::post('/result', [ApiController::class, 'detectStyle'])->name('upload.detect');  // Xử lý ảnh và trả kết quả
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

// Route dành cho trang admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Route dành cho trang user
Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');


// Route cho trang không tìm thấy (404)
Route::fallback(function () {
    return view('404'); // Trang lỗi 404
});
