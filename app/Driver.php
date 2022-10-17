<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'driver';
    protected $primarykey = 'driver_id';

    public $timestamps = false;

    protected $fillable=['name','jeniskendaraan','mobil','bahanbakar'];

    public function monitoring_kendaraan()
    {
        
        return $this->hasMany(Monitoring_kendaraan::class);
    }
}