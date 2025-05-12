<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use ScssPhp\ScssPhp\Compiler;

class CompileSass extends Command
{
    protected $signature = 'sass:compile';
    protected $description = 'Compile SCSS to CSS';

    public function handle()
    {
        $scss = new Compiler();
        $scss->setImportPaths(resource_path('scss/'));

        // Đọc tệp SCSS chính
        $scssContent = file_get_contents(resource_path('scss/style.scss'));

        // Biên dịch SCSS thành CSS
        $css = $scss->compileString($scssContent)->getCss();

        // Ghi CSS vào tệp đầu ra
        file_put_contents(public_path('css/style.css'), $css);

        $this->info('SCSS compiled to CSS successfully!');
    }
}