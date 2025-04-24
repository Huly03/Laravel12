<?php

use App\Http\Controllers\Auth\LoginController;
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
use App\Http\Controllers\ArchitectureStyleController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ModelController;



Route::get('/model-selection', [ModelController::class, 'showForm'])->name('model-selection');
Route::post('/model-selection', [ModelController::class, 'submitSelection']);
Route::get('/model-use/{id}', [ModelController::class, 'useModel'])->name('useModel');
Route::get('/model-delete/{id}', [ModelController::class, 'deleteModel'])->name('deleteModel');



Route::put('/users/{id}', [UserController::class, 'update'])->name('updateUser');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('deleteUser');

// Route để hiển thị ảnh của người dùng
Route::get('/ketqua', [ImageController::class, 'index'])->name('images.index');
Route::delete('/ketqua', [ArchitectureStyleController::class, 'deleteImage'])->name('deleteImage');


Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserAccountController::class, 'index'])->name('users.index'); // Tất cả users
    Route::get('/my-account', [UserAccountController::class, 'profile'])->name('my.account'); // Người dùng hiện tại
    Route::post('/my-account/update', [UserAccountController::class, 'updateProfile'])->name('my.account.update');
});

// 📄 Hiển thị thông tin tài khoản
Route::get('/user/account/profile', [AccountController::class, 'profile'])->name('account.profile')->middleware('auth');
Route::resource('/user/account', AccountController::class)->only(['show', 'update']);

// ✏️ Cập nhật thông tin tài khoản (chuẩn REST → dùng PUT)
Route::put('/user/account/profile', [AccountController::class, 'updateAccount'])->name('account.update')->middleware('auth');

Route::get('/user/projects', [ProjectController::class, 'index'])->name('project.index');

Route::get('/user/architectures/view/{id}', [ArchitectureController::class, 'showDetail'])->name('architecture.detail');

Route::get('/user/architectures/view', [ArchitectureController::class, 'viewOnly'])->name('architecture.viewOnly');

Route::get('/result', [ArchitectureStyleController::class, 'showImages'])->name('images');
Route::get('/result/edit/{id}', [ArchitectureStyleController::class, 'editImage'])->name('editImage');
Route::put('/result/{id}', [ArchitectureStyleController::class, 'updateImage'])->name('updateImage');
Route::delete('/result/{id}', [ArchitectureStyleController::class, 'deleteImage'])->name('deleteImage');

Route::post('/save-recognition-result', [ArchitectureStyleController::class, 'saveRecognitionResult'])->name('saveRecognitionResult');

Route::resource('apiCalls', ApiCallController::class);
Route::get('/api-calls', [ApiCallController::class, 'index'])->name('api.calls.index');

Route::resource('accounts', AccountController::class);

// Hiển thị form thêm dự án
Route::get('/project', [ProjectController::class, 'create'])->name('project.create');
Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
Route::post('/project', [ProjectController::class, 'store'])->name('projects.store');
// Lưu kiến trúc vào cơ sở dữ liệu
Route::get('architecture', [ArchitectureController::class, 'create'])->name('architecture');
Route::post('architecture', [ArchitectureController::class, 'store']);
Route::get('architecture/{id}', [ArchitectureController::class, 'show'])->name('architecture.show');
Route::get('architecture/{id}/edit', [ArchitectureController::class, 'edit'])->name('architecture.edit');
Route::put('architecture/{id}', [ArchitectureController::class, 'update']);
Route::delete('architecture/{id}', [ArchitectureController::class, 'destroy']);

Route::get('/user/upload', [ApiController::class, 'showFormv2'])->name('uploadFormV2'); // Trang giao diện upload
// Gửi ảnh -> nhận kết quả từ Flask
Route::post('/user/upload', [ApiController::class, 'uploadImageV2'])->name('uploadImageV2');
// Giao diện upload và chatbot
Route::middleware('auth')->get('/upload/{id}', [ApiController::class, 'showForm'])->name('uploadForm');
Route::middleware('auth')->post('/upload/{id}', [ApiController::class, 'uploadImage'])->name('uploadImage');

// Gửi câu hỏi cho chatbot
Route::post('/chatbot', [ApiController::class, 'chatWithBot'])->name('chatWithBot');
// Tìm kiếm
Route::post('/search', [ApiController::class, 'searchQuery'])->name('searchQuery');
Route::post('/search', [HeaderController::class, 'searchQuery'])->name('searchQuery');
// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route đăng ký
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
// Route đăng nhập
Route::get('/login', [LoginController::class, 'showForm'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route phân quyền
// Route dành cho trang admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->name('user.dashboard')->middleware('auth');
// Route cho trang không tìm thấy (404)
Route::fallback(function () {
    return view('404'); // Trang lỗi 404
});
