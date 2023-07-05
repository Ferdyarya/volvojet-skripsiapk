<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Unit;
use App\Models\Supplier;

class Partretur extends Model
{
    use HasFactory;

     protected $fillable = [
         'nama', 'pn', 'qty','id_supplier','id_unit',"tanggal"
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
