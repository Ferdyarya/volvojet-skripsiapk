<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Customermaster;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_customermaster', 'id_unit', 'alamat', 'email', 'kode', 'harga', 'qty','tanggal'
    ];

     public function customermaster()
    {
        return $this->hasOne(Customermaster::class, 'id', 'id_customermaster');
    }

     public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'id_unit');
    }

}
