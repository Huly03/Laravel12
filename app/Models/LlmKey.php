<?php

// app/Models/LlmKey.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LlmKey extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu không sử dụng bảng mặc định (nên Laravel sẽ tự động chọn 'llm_keys' vì tên số nhiều)
    protected $table = 'llm_keys';

    // Đặt các thuộc tính có thể gán đại trà (mass assignable)
    protected $fillable = [
        'llm_name',
        'api_key',
        'status',
    ];
}
