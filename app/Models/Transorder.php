<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Custorder;
use App\Models\Customermaster;

class Transorder extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_custorder', 'id_customermaster', 'tanggal', 'qty','wo'
    ];

     public function custorder()
    {
        return $this->hasOne(Custorder::class, 'id', 'id_custorder');
    }

    public function customermaster()
    {
        return $this->hasOne(Customermaster::class, 'id', 'id_customermaster');
    }
}
