<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietMaGiamGia extends Model
{
    use HasFactory;
    protected $table='chitiet_ma_giamgia';
    protected $fillable = [
        'IdMaGiamGia',
        'IdKH',

    ];
}
