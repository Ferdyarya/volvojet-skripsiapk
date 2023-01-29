<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'id_unit', 'harga', 'gambar', 'qty'
    ];

    public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'id_unit');
    }
}
