<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonNhap extends Model
{
    use HasFactory;
    protected $table='chitiethoadonnhap';
    protected $fillable = [
        'id',
        'IdSach',
        'IdHoaDN',
        'SoLuong',

    ];
}
