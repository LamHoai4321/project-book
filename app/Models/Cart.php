<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table='giohang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Id_Sach',
        'Id_TK',
        'So_Luong',
        'TrangThai',
    ];
    public function Sach(){
        return $this->belongsTo('App\Models\Sach', 'Id_Sach', 'id');
    }
    public function TaiKhoan(){
        return $this->belongsTo('App\Models\User', 'Id_TK', 'id');
    }
}
