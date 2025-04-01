<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Kiểm tra dữ liệu nhập vào
        $validated = $request->validate([
            'username' => 'required|unique:users,username|max:255',
            'password' => 'required|confirmed|min:8',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'gender' => 'required|in:0,1', // 0 = Nam, 1 = Nữ
            'address' => 'required|string',
            'birthday' => 'required|date',
        ]);

        // Lưu người dùng vào cơ sở dữ liệu
        $user = new User();
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->address = $request->input('address');
        $user->birthday = $request->input('birthday');
        $user->save();

        // Quay lại trang đăng nhập với thông báo thành công
        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }
}
