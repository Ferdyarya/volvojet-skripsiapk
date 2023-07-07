<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Unit;
use App\Models\Supplier;
use App\Models\Customermaster;

class Transorder extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_supplier','id_unit','id_customermaster','namapart','pemohon','qty','wo','tanggal'
    ];

     public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'id_supplier');
    }
     public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'id_unit');
    }
     public function customermaster()
    {
        return $this->hasOne(Customermaster::class, 'id', 'id_customermaster');
    }


}
