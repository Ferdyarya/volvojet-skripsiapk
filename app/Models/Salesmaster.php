<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesmaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','kode','email','no_telp'
    ];
}
