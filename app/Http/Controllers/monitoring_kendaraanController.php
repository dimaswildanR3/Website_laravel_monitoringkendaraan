<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Monitoring_kendaraan;
use App\Driver;

class monitoring_kendaraanController extends Controller
{
    public function index() {

        $monitor = Monitoring_kendaraan::all();
        $driver = Driver::all();
        return view('Monitoring/index',compact('monitor','driver'));
        // return view('Monitoring/indexpenyetuju',compact('monitor'));
    }

    public function store(Request $request)
  {
    
    $validator = Validator::make($request->all(),[
    
        'name'  => 'required',
        'driver_id'  => 'required',
        'pemakaian'  => 'required',
        'pengembalian'  => 'required',
        'persetujuan'  => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors());
    }

    $monitor = new Monitoring_kendaraan();
    $monitor -> name   = $request -> name;
    $monitor -> driver_id   = $request -> driver_id;
    $monitor -> pemakaian   = $request -> pemakaian;
    $monitor -> pengembalian   = $request -> pengembalian;
    $monitor -> persetujuan   = $request -> persetujuan;


    $monitor->save();

    return redirect()->back()->with('success','monitor ditambah successfully');
    
  }

  public function getAll()
  {
       $monitor= Monitoring_kendaraan::all();


       return view('Monitoring.index',['monitor']);
       return view('Monitoring.indexpenyetuju',['monitor']);
  }

  public function getById($id)
  {
     $monitor = Monitoring_kendaraan::where('id', '=', $id)->first();
        
     return view('Monitoring.index',['monitor']);
     return view('Monitoring.indexpenyetuju',['monitor']);
  }

  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(),[
      'name'  => 'required',
      'driver_id'  => 'required',
      'pemakaian'  => 'required',
      'pengembalian'  => 'required',
      'persetujuan'  => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors());
    }

     $monitor = Monitoring_kendaraan::where('id', '=', $id)->first();
     $monitor -> name   = $request -> name;
     $monitor -> driver_id   = $request -> driver_id;
     $monitor -> pemakaian   = $request -> pemakaian;
     $monitor -> pengembalian   = $request -> pengembalian;
     $monitor -> persetujuan   = $request -> persetujuan;

    
     $monitor->save();

     
     return redirect()->back()->with('success','monitor diubah successfully');
  }

 public function destroy($id)
    {
        $delete = Monitoring_kendaraan::where('id', '=', $id)->delete();

        return redirect()->back()->with('success', 'monitor Deleted Successfully');
}
}

