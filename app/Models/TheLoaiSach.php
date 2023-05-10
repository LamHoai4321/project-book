<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoaiSach extends Model
{
    use HasFactory;
    protected $table='theloai_sach';
    protected $fillable = [
        'IdSach',
        'IdTheLoai',

    ];
    public function Sach(){
        return $this->belongsTo('App\Models\Sach', 'IdSach', 'id');
    }
    public function TheLoai(){
        return $this->belongsTo('App\Models\TheLoai', 'IdTheLoai', 'id');
    }
}
