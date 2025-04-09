<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchitectureStyle extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'style',
        'detection_time',
        'id_user',
    ];
    
    

}

