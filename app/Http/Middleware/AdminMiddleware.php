<?php

// app/Http/Middleware/AdminMiddleware.php
namespace App\Http\Middleware;

// app/Http/Middleware/AdminMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng có quyền admin không (level = 1)
        if (Auth::check() && Auth::user()->level == 1) {
            return $next($request); // Nếu là admin, tiếp tục xử lý yêu cầu
        }

        // Nếu không phải admin, chuyển hướng người dùng
        return redirect()->route('login')->with('error', 'Bạn không có quyền truy cập vào trang này.');
    }
}



