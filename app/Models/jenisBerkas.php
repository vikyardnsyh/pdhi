<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisBerkas extends Model
{
    use HasFactory;
    //definisikan tabel di DB
    protected $table = "jenis_berkas_dokter"; 
    protected $primaryKey = 'id';
    public $timestamps = false;
}
