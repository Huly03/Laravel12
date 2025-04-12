<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_name',
        'user_id',
        'ip_address',
        'timestamp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' là cột khóa ngoại trong bảng api_calls
    }    
}

