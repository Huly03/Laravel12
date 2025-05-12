<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra đăng nhập và level=1 (admin)
        if (!Auth::check() || Auth::user()->level != 1) {
            return redirect()->route('login.show')->with('error', 'Bạn không có quyền truy cập!');
        }

        return $next($request);
    }
}