<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $table='binhluan';
    protected $fillable = [
        'id',
        'IdSach',
        'IdKH',
        'HoTen',
        'NoiDung',
        'Ngay',
        'Duyet',
        'TrangThai',
    ];
    public function Sach(){
        return $this->belongsTo('App\Models\Sach', 'IdSach', 'id');
    }
    public function TaiKhoan()
    {
        return $this->belongsTo('App\Models\User','IdKH','id');
    }
}
