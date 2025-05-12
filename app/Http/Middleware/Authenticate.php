<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra đăng nhập và level=2 (user)
        if (!Auth::check() || Auth::user()->level != 2) {
            return redirect()->route('login.show')->with('error', 'Vui lòng đăng nhập!');
        }

        return $next($request);
    }
}