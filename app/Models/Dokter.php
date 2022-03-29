<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Dokter extends Model
{
    use HasFactory;
    //definisikan tabel di DB
    protected $table = "dokter"; 
    protected $primaryKey = 'id';
    public $timestamps = false;

}
