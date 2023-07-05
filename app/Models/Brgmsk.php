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
       'partmasuk', 'id_supplier', 'tanggal', 'qty'
   ];

   public function supplier()
   {
       return $this->hasOne(Supplier::class, 'id', 'id_supplier');
   }
}

