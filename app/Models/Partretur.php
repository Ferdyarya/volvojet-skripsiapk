<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partretur extends Model
{
    use HasFactory;

     protected $fillable = [
         'nama', 'pn', 'qty','asalpart','id_unit',"tanggal"
    ];

     public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'id_unit');
    }
}
