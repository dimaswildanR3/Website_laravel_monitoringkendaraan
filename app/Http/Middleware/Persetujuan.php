<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Persetujuan extends Model
{
    protected $table = 'persetujuan';
    protected $primarykey = 'id_persetujuan';

    public $timestamps = false;

    protected $fillable =['persetujuan'];
}
