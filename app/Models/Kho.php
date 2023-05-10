<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kho extends Model
{
    use HasFactory;
    protected $table='kho';
    protected $fillable = [
        'id',
        'IdSach',
        'SoLuongTon',
        'Xoa',

    ];
    public function Sach(){
        return $this->belongsTo('App\Models\Sach', 'IdSach', 'id');
    }
}
