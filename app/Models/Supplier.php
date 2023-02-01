<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $fillable = [
        'nama', 'produk', 'alamat', 'email', 'kode', 'qty'
    ];

    //  public function product()
    // {
    //     return $this->hasOne(Product::class, 'id', 'id_product');
    // }

    //  public function brg_msk()
    // {
    //     return $this->hasOne(Unit::class, 'id', 'id_brg_masuk');
    // }
}
