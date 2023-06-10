<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transorder extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product', 'id_customer', 'tanggal', 'qty','wo','status'
    ];

     public function product()
    {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }

    public function customer()
    {
        return $this->hasOne(Customers::class, 'id', 'id_customer');
    }
}
