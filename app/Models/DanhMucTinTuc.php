<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucTinTuc extends Model
{
    use HasFactory;
    protected $table='theloai_tintuc';
    protected $fillable = [
        'id',
        'ten',
    ];
    public $timestamps = false;
    public function TinTuc()
    {
        return $this->hasMany(Post::class);
    }
}
