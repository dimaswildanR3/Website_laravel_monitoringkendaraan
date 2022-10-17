<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisskendaraan extends Model
{
    protected $table = 'jenisskendaraan';
    protected $primarykey = 'id_jenisskendaraan';

    public $timestamps = false;

    protected $fillable =['merek','jenis'];
}
