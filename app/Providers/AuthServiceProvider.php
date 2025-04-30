<?php
// app/Providers/AuthServiceProvider.php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Định nghĩa Gate 'admin'
        Gate::define('admin', function ($user) {
            return $user->level === 1; // Kiểm tra xem người dùng có level = 1 (admin) không
        });
    }
}


