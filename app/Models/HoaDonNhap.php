<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    use HasFactory;
    protected $table='hoadonnhap';
    protected $fillable = [
        'id',
        'IdSach',
        'GiaNhap',
        'SoLuong',
        'NgayNhap',
        'TrangThai',

    ];
}
