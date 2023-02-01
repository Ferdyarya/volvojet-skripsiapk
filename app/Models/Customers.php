<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'id_product', 'id_unit', 'alamat', 'email', 'hp', 'harga', 'qty'
    ];

     public function product()
    {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }

     public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'id_unit');
    }

}
