<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDonBan extends Model
{
    use HasFactory;
    protected $table='chitiethoadonban';
    protected $fillable = [
        'id',
        'IdSach',
        'IdHoaDB',
        'SoLuong',
        'GiaBan',

    ];
    public function Sach(){
        return $this->belongsTo('App\Models\Sach', 'IdSach', 'id');
    }
    public function HoaDon(){
        return $this->belongsTo('App\Models\HoaDonBan', 'IdHoaDB', 'id');
    }
}
