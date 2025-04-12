<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchitectureStyle extends Model
{
    use HasFactory;

    // Đảm bảo rằng tên bảng là 'architecture_styles'
    protected $table = 'architecture_styles';

    // Các trường bạn muốn cho phép truy cập
    protected $fillable = ['name', 'description', 'image_url', 'id_user'];
}

