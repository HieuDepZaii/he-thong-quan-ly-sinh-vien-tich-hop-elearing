<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    use HasFactory;
    protected $table='users';
    protected $attributes=[
        'level'=>2,
        'anh'=>'img/avata_user.png',
    ];
}
