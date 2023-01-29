<?php

namespace App\Models;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

     protected $fillable = [
        'id_unit', 'nama', 'harga', 'qty'
    ];

     public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'id_unit');
    }

}
