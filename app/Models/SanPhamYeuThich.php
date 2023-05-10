<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamYeuThich extends Model
{
    use HasFactory;
    protected $table='sanphamyeuthich';
    protected $fillable = [
        'id',
        'IdSach',
        'IdKH',
        'TrangThai',

    ];
    public function Sach(){
        return $this->belongsTo('App\Models\Sach', 'IdSach', 'id');
    }
}
