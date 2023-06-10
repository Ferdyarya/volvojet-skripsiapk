<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custorder extends Model
{
    use HasFactory;
    protected $table = 'custorders';
    protected $fillable = [
        'id_product','namacust', 'qty', 'tanggal', 'wo'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }
}
