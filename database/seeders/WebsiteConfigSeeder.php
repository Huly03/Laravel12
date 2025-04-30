<?php

use Illuminate\Database\Seeder;
use App\Models\WebsiteConfig;

class WebsiteConfigSeeder extends Seeder
{
    public function run()
    {
        WebsiteConfig::create([
            'website_name' => 'Website Name',
            'description' => 'This is a description of the website.',
            'keywords' => 'keyword1, keyword2',
            'logo' => 'logo.png',
            'favicon' => 'favicon.ico',
            'sitemap' => 'https://your-sitemap-url.com',
            'website_status' => 'active',
            'website_type' => 'simple',
            'contact_email' => 'contact@website.com',
            'contact_phone' => '1234567890',
            'address' => '123 Street Name',
            'business_info' => 'Business information goes here',
        ]);
    }
}

