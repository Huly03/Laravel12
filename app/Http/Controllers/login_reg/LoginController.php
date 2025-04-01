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
    public function showLoginForm()
    {
        return view('login_reg.login'); // Trả về view đăng nhập
    }

    public function login(Request $request)
{
    // Kiểm tra request là POST
    if ($request->isMethod('post')) {
        $request->validate([
            'Username' => 'required|string',
            'Password' => 'required|string',
        ]);

        $username = $request->input('Username');
        $password = $request->input('Password');

        // Kiểm tra nếu người dùng nhập đúng admin và admin123
        if ($username === 'admin' && $password === 'admin123') {
            // Tạo session cho admin
            Session::put('cc_Username', 'admin');
            return redirect()->route('admin.dashboard')->with('message', 'Đăng nhập admin thành công!');
        }

        // Kiểm tra thông tin người dùng trong database nếu không phải admin
        $user = DB::table('users')->where('username', $username)->first();  // Thay 'Username' thành 'username'

        if ($user && Hash::check($password, $user->password)) {  // Thay 'Password' thành 'password'
            // Sử dụng session hoặc Auth để lưu trạng thái đăng nhập
            Session::put('cc_Username', $user->username);

            // Kiểm tra nếu người dùng là admin
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('message', 'Đăng nhập admin thành công!');
            }

            // Đối với người dùng bình thường, chuyển hướng đến trang user
            return redirect()->route('user.dashboard')->with('message', 'Đăng nhập người dùng thành công!');
        }

        return back()->withErrors(['error' => 'Tên đăng nhập hoặc mật khẩu không chính xác, vui lòng nhập lại']);
    }

    return back()->withErrors(['error' => 'Có lỗi trong quá trình đăng nhập']);
}



}
