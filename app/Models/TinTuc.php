<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;
    protected $table='tintuc';
    protected $fillable = [
        'id',
        'title',
        'content',
        'category_id',
        'image'
    ];
    public $timestamps = false;

    public function DanhSachTinTuc(){
        return $this->belongsTo('App\Models\DanhMucTinTuc', 'category_id', 'id');
    }
}
