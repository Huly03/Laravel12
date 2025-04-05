<?php

namespace App\Http\Controllers\login_reg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('login_reg.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validate dữ liệu nhập vào
            $request->validate([
                'Username' => 'required|string',
                'Password' => 'required|string',
            ]);

            $username = $request->input('Username');
            $password = $request->input('Password');

            // Truy vấn bảng accounts để lấy thông tin người dùng
            $user = DB::table('accounts')->where('username', $username)->first(); 

            if ($user && Hash::check($password, $user->password)) {  // So sánh mật khẩu đã mã hóa
                Session::put('cc_Username', $user->username);

                // Kiểm tra quyền người dùng dựa trên username
                if ($user->username == 'admin') {  // Kiểm tra nếu tài khoản là admin
                    return redirect()->route('admin.dashboard')->with('message', 'Đăng nhập admin thành công!');
                }

                return redirect()->route('user.dashboard')->with('message', 'Đăng nhập người dùng thành công!');
            }

            return back()->withErrors(['error' => 'Tên đăng nhập hoặc mật khẩu không chính xác']);
        }

        return back()->withErrors(['error' => 'Có lỗi trong quá trình đăng nhập']);
    }
}
