<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\Salesmaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_salesmaster', 'id_unit', 'harga', 'qty', 'tanggal'
    ];

    public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'id_unit');
    }
    public function salesmaster()
    {
        return $this->hasOne(Salesmaster::class, 'id', 'id_salesmaster');
    }
}
