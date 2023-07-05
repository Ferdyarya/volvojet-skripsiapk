<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

     protected $fillable = [
        'id_unit','id_supplier', 'nama', 'qty','tanggal'
    ];

     public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'id_unit');
    }

     public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'id_supplier');
    }

}
