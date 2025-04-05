<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    // Định nghĩa bảng 'accounts' (Laravel mặc định là bảng 'accounts')
    protected $table = 'accounts';

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'username', 'password', 'gender', 'phone', 'email', 'birth_date', 'address',
    ];
    // Tắt tính năng timestamps
    public $timestamps = false;


}
