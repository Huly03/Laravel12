<?php

use App\Http\Controllers\Login_reg\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ArchitectureController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ApiCallController;

Route::resource('apiCalls', ApiCallController::class);


Route::get('/api-calls', [ApiCallController::class, 'index'])->name('api.calls.index');


Route::resource('accounts', AccountController::class);

// Hiển thị form thêm dự án
Route::get('/project', [ProjectController::class, 'create'])->name('project.create');
Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
// Lưu dự án vào cơ sở dữ liệu
Route::post('/project', [ProjectController::class, 'store'])->name('projects.store');


// Route hiển thị chi tiết phong cách kiến trúc
Route::get('architecture/{id}', [ArchitectureController::class, 'show'])->name('architecture.show');
// Route chỉnh sửa phong cách kiến trúc
// Route chỉnh sửa phong cách kiến trúc
Route::get('architecture/{id}/edit', [ArchitectureController::class, 'edit'])->name('architecture.edit');
Route::put('architecture/{id}', [ArchitectureController::class, 'update'])->name('architecture.update');

// Route xóa phong cách kiến trúc
Route::delete('architecture/{id}', [ArchitectureController::class, 'destroy'])->name('architecture.destroy');


// Route cho việc thêm và lưu phong cách kiến trúc
Route::get('architecture', [ArchitectureController::class, 'create']); // Trang form thêm phong cách kiến trúc
Route::post('architecture', [ArchitectureController::class, 'store'])->name('architecture'); // Lưu phong cách kiến trúc

// Giao diện upload và chatbot
Route::get('/upload', [ApiController::class, 'showForm'])->name('uploadForm'); // Trang giao diện upload

// Gửi ảnh -> nhận kết quả từ Flask
Route::post('/upload', [ApiController::class, 'uploadImage'])->name('uploadImage');

// Gửi câu hỏi cho chatbot
Route::post('/chatbot', [ApiController::class, 'chatWithBot'])->name('chatWithBot');

// Tìm kiếm
Route::post('/search', [ApiController::class, 'searchQuery'])->name('searchQuery');
Route::post('/search', [HeaderController::class, 'searchQuery'])->name('searchQuery');

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route đăng ký
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('registerPost');

// Route đăng nhập
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginPost');

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
