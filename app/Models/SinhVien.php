<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;
    protected $table='sinh_vien';
    protected $attributes=[
        'anh'=>'img/user-alt-512.png'
    ];
}
