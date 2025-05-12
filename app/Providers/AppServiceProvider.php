<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\WebsiteConfig;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
// Share WebsiteConfig with all views
$config = WebsiteConfig::first();

// If no configuration exists, create default values
if (!$config) {
    $config = WebsiteConfig::create([
        'website_name' => 'Website Mặc Định',
        'description' => 'Mô tả mặc định cho website.',
        'keywords' => 'default, website, laravel',
        'logo' => null,
        'favicon' => null,
        'sitemap' => null,
        'website_status' => 'active',
        'website_type' => 'simple',
        'contact_email' => 'contact@example.com',
        'contact_phone' => '0123456789',
        'address' => 'Địa chỉ mặc định',
        'business_info' => 'Thông tin doanh nghiệp mặc định',
    ]);
}

// Share the config variable globally
View::share('config', $config);
}
}
