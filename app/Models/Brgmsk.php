<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brgmsk extends Model
{
    use HasFactory;

    protected $fillable = [
       'id_products', 'id_supplier', 'tanggal'
   ];

    public function Products()
   {
       return $this->hasOne(Products::class, 'id', 'id_products');
   }

   public function Supplier()
   {
       return $this->hasOne(Supplier::class, 'id', 'id_supplier');
   }
}

