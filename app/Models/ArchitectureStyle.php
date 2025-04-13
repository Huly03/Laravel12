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
    protected $fillable = [
        'image',          // Đường dẫn ảnh
        'style',          // Phong cách nhận diện
        'detection_time', // Thời gian nhận diện
        'id_user',        // ID người dùng
    ];

    // Nếu bạn muốn có quan hệ giữa ArchitectureStyle và User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // Liên kết với User model
    }
}


