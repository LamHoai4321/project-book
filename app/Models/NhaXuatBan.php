<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaXuatBan extends Model
{
    use HasFactory;
    protected $table='nhaxuatban';
    protected $fillable = [
        'id',
        'tennhaxb',
    ];
}
