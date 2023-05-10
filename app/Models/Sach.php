<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;
    protected $table='sach';
    protected $fillable = [
        'id',
        'TenSach',
        'AnhSach',
        'NhaXuatBan',
        'IdNCC',
        'LoaiBia',
        'SoTrang',
        'NamXB',
        'GiaTien',
        'DichGia',
        'KichThuoc',
        'MoTa',
        'IdKM',
        'TrangThai',

    ];
    public function NhaCungCap(){
        return $this->belongsTo('App\Models\NhaCungCap', 'IdNCC', 'id');
    }
    public function KhuyenMai(){
        return $this->belongsTo('App\Models\KhuyenMai', 'IdKM', 'id');
    }
    public function NhaXuatBans(){
        return $this->belongsTo('App\Models\NhaXuatBan', 'NhaXuatBan','id');
    }
    public function TacGia(){
        return $this->belongsTo('App\Models\TacGia', 'DichGia','id');
    }
    public function KichThuocs(){
        return $this->belongsTo('App\Models\KichThuoc', 'KichThuoc','id');
    }
}
