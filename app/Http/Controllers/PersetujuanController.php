<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Monitoring_kendaraan;
use App\Driver;

class PersetujuanController extends Controller
{
  public function index() {

    $data = Monitoring_kendaraan::all();
    $driver = Driver::all();
    return view('Monitoring/indexpenyetuju',compact('data','Driver'));
} 
public function update(Request $request, $id)
{
  $validator = Validator::make($request->all(),[
      'persetujuan'  => 'required',
  ]);

  if ($validator->fails()) 
    return response()->json($validator->errors());
  

$data = Monitoring_kendaraan::where('id', '=', $id)->first();
$data -> persetujuan   = $request -> persetujuan;

  
   $data->save();

   return redirect()->back()->with('success','Data diubah successfully');
}
    
}
