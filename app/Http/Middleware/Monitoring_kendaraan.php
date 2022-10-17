<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring_kendaraan extends Model
{
    protected $table = 'monitoring_kendaraan';
    protected $primarykey = 'id_monitoring';

    public $timestamps = false;

    protected $fillable =['name','id_jenisskendaraan','id_driverr','Bahanbakar','BBM','jadwalservice','pemakaian','pengembalian','id_persetujuan'];
}
