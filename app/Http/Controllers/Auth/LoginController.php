<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Tự động đăng nhập nếu cần dùng Auth::login
            Auth::login($user);

            // Chuyển hướng theo level
            if ($user->level == 1) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->level == 2) {
                return redirect()->route('user.dashboard');
            } else {
                return redirect()->route('login.show')->with('error', 'Không có quyền truy cập.');
            }
        }

        return back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.show');
    }
}
