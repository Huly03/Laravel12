<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    // 🧾 Xem danh sách toàn bộ user
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // 👤 Xem thông tin người dùng đang đăng nhập
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    // 🛠️ Cập nhật thông tin của người dùng hiện tại
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username'   => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'nullable|string|max:15',
            'dia_chi'    => 'nullable|string|max:255',
            'fullname'   => 'required|string|max:255',
        ]);
        $user->update($request->except('username')); // Không cập nhật trường username

        $user->update($request->only(['username', 'email', 'phone', 'dia_chi', 'fullname']));

        return redirect()->route('my.account')->with('success', 'Cập nhật thành công!');
    }
}
