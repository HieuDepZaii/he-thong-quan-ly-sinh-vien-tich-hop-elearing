<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangDay extends Model
{
    use HasFactory;
    protected $table='diem_danh';
    protected $attributes=[
        'diemcc'=>0
    ];
}
