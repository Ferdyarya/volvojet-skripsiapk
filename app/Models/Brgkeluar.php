<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customermaster;

class Brgkeluar extends Model
{
    use HasFactory;

    protected $fillable = [
       'partkeluar', 'id_customermaster', 'tanggal', 'qty'
   ];

   public function customermaster()
   {
       return $this->hasOne(Customermaster::class, 'id', 'id_customermaster');
   }
}
