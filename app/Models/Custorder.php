<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customermaster;
use App\Models\Product;


class Custorder extends Model
{
    use HasFactory;
    protected $table = 'custorders';
    protected $fillable = [
        'order_product','id_customermaster', 'qty', 'tanggal', 'wo'
    ];

    public function customermaster()
    {
        return $this->hasOne(Customermaster::class, 'id', 'id_customermaster');
    }
}
