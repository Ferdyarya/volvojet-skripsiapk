<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brgmsk extends Model
{
    use HasFactory;

    protected $fillable = [
       'id_product', 'id_supplier', 'tanggal', 'qty'
   ];

    public function product()
   {
       return $this->hasOne(Product::class, 'id', 'id_product');
   }

   public function supplier()
   {
       return $this->hasOne(Supplier::class, 'id', 'id_supplier');
   }
}

