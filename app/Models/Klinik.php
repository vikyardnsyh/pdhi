<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{
    use HasFactory;
    //definisikan tabel di DB
    protected $table = "klinik"; 
    protected $primaryKey = 'id';
    public $timestamps = false;
}
