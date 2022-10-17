<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Monitoring_kendaraan;
use App\Exports\MonitoringExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class MonitorController extends Controller
{
    public function index()
	{
		$data = Monitoring_kendaraan::all();
		return view('monitoring_kendaraan',['monitoring_kendaraan'=>$data]);
	}
 
	public function export_excel()
	{
		return Excel::download(new MonitoringExport, 'Monitoring Kendaraan.xlsx');
	}
}
