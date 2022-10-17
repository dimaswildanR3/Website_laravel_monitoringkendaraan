<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Monitoring_kendaraan;

class PersetujuanController extends Controller
{
  public function index() {

    $data = DB::table('monitoring_kendaraan')->get();
    return view('Monitoring/indexpenyetuju',compact('data'));
}

}

{
  $validator = Validator::make($request->all(),[
      'persetujuan'  => 'required',
  ]);

  if ($validator->fails()) {
    return response()->json($validator->errors());
  }

   $data =
onitoring_ke
araan::where
id', '=', $id)->first();
   $data -> persetujuan   = $request -> persetujuan;

  
   $data->save();

   return redirect()->back()->with('success','Data diubah successfully');
}
    
}
