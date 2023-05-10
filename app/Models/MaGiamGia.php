<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaGiamGia extends Model
{
    use HasFactory;
    protected $table='ma_giamgia';
    protected $fillable = [
        'id',
        'Code',
        'SoLuong',
        'ChietKhau',
        'LoaiKM',
        'NgayBĐ',
        'NgayKT',
        'TrangThai',

    ];
}
