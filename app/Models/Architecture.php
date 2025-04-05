<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Architecture extends Model
{
    use HasFactory;

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'name', 'image_url', 'description', 'text_file',
    ];
    public $timestamps = false;

}
