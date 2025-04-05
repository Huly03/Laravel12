<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;  // Import mô hình Account
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
        // Validate dữ liệu nhập vào
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:255|unique:accounts',  // Kiểm tra tài khoản đã tồn tại
            'password' => 'required|confirmed|min:8',  // Kiểm tra mật khẩu và xác nhận
            'gender' => 'required|in:0,1',
            'phone' => 'nullable|numeric',
            'email' => 'required|email|unique:accounts',  // Kiểm tra email đã tồn tại
            'birth_date' => 'required|date',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tạo tài khoản mới
        $account = new Account();  // Sử dụng mô hình Account
        $account->username = $request->username;
        $account->password = Hash::make($request->password);  // Mã hóa mật khẩu trước khi lưu
        $account->gender = $request->gender;
        $account->phone = $request->phone;
        $account->email = $request->email;
        $account->birth_date = $request->birth_date;
        $account->address = $request->address;
        $account->save();  // Lưu người dùng vào cơ sở dữ liệu

        // Chuyển hướng về trang đăng ký với thông báo thành công
        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }
}
