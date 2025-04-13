<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'sdt' => 'nullable|string|max:11',
            'dia_chi' => 'nullable|string',
            'password' => 'required|string|min:6|confirmed',
            'level' => 'required|string',
        ]);

        User::create([
            'fullname' => $validated['fullname'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'sdt' => $validated['sdt'],
            'dia_chi' => $validated['dia_chi'],
            'level' => $validated['level'],
            'status' => '1',
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login.show')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập.');
    }
}
