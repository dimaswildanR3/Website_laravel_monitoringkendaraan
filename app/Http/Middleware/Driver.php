<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'driverr';
    protected $primarykey = 'id_driverr';

  

    protected $fillable =['nama'];
}
