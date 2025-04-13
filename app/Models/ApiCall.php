<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_name',   // Tên API
        'user_id',    // ID người dùng
        'ip_address', // Địa chỉ IP
        'timestamp',  // Thời gian gọi API
    ];

    // Quan hệ với model User (một ApiCall thuộc về một User)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Liên kết với User model
    }    
}


