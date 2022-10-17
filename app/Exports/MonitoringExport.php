<?php

namespace App\Exports;

use App\monitoring_kendaraan;
use Maatwebsite\Excel\Concerns\FromCollection;

class MonitoringExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return monitoring_kendaraan::all();
    }
}
