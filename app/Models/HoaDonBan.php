<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonBan extends Model
{
    use HasFactory;
    protected $table='hoadonban';
    protected $fillable = [
        'id',
        'IdKH',
        'NgayLap',
        'DiaChiGH',
        'SDT',
        'TongTien',
        'id_makm',
        'PhuongTTT',
        'TrangThai',

    ];
    public function TaiKhoan(){
        return $this->belongsTo('App\Models\User', 'IdKH', 'id');
    }
    public function MaGiamGia(){
        return $this->belongsTo('App\Models\MaGiamGia', 'id_makm', 'id');
    }
}
