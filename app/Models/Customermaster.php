<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customermaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','alamat','kode','email'
    ];
}
