<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            session(['user_id' => Auth::id()]);
            $user = Auth::user();
            
            // Kiểm tra level và chuyển hướng
            if ($user->level == 1) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->level == 2) {
                return redirect()->route('user.dashboard');
            } elseif ($user->level == 3) {
                return redirect()->route('user.dashboard');
            } elseif ($user->level == 4) {
                return redirect()->route('user.dashboard');
            } else {
                Auth::logout();
                return back()->with('error', 'Tài khoản không có quyền truy cập!');
            }
        }

        return back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu!');
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        // 1. Đăng xuất khỏi hệ thống (xóa thông tin user đã xác thực)
        Auth::logout();
    
        // 2. Xóa toàn bộ session hiện tại (bao gồm mọi session đã lưu)
        $request->session()->flush();
    
        // 3. Hủy phiên làm việc (session) và tạo lại CSRF token mới (bảo mật)
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // 4. Chuyển hướng về trang đăng nhập
        return redirect()->route('login.show');
    }
}