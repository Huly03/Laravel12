<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use Notifiable;

    // Gắn với bảng `accounts`
    protected $table = 'accounts';

    // Tắt tự động timestamps
    public $timestamps = false;

    // Cho phép gán các field này hàng loạt
    protected $fillable = [
        'username',
        'password',
        'gender',
        'phone',
        'email',
        'birth_date',
        'address',
    ];

    // Ẩn các field khi chuyển sang JSON (bảo mật)
    protected $hidden = [
        'password',
    ];

    /**
     * Dùng username thay vì email để làm auth identifier.
     */
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    /**
     * Trả về mật khẩu để hệ thống Auth dùng khi xác thực.
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
}
