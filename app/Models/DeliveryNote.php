<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product', 'id_customer', 'id_custorder','id_transorder','qty','tanggal','wo'
    ];

     public function product()
    {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }

    public function customer()
    {
        return $this->hasOne(Customers::class, 'id', 'id_customer');
    }

    public function custorder()
    {
        return $this->hasOne(Custorder::class, 'id', 'id_customer');
    }

    public function transorder()
    {
        return $this->hasOne(Transorder::class, 'id', 'id_customer');
    }
}
