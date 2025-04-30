<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
        // Validate dữ liệu đầu vào
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Attempt login sử dụng Auth::attempt()
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Lưu user_id vào session sau khi đăng nhập
            session(['user_id' => Auth::id()]);
    
            // Kiểm tra cấp độ người dùng và chuyển hướng
            $user = Auth::user();
            if ($user->level == 1) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->level == 2) {
                return redirect()->route('user.dashboard');
            } else {
                Auth::logout(); // Đăng xuất nếu không có quyền
                return redirect()->route('login.show')->with('error', 'Không có quyền truy cập.');
            }
        }
    
        // Nếu đăng nhập thất bại
        return back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu.');
    }
        

    public function someAction()
    {
        // Kiểm tra xem người dùng có quyền admin không
        if (Gate::allows('admin')) {
            // Người dùng là admin
            return view('admin.dashboard');
        } else {
            // Người dùng không phải admin
            return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập!');
        }
    }
    
    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect()->route('login.show');
    }
}

