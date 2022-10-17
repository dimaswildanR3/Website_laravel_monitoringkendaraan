<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Driver;

class DriverController extends Controller
{
    public function index() {

        $driver = Driver::all();
        return view('Driver/index',compact('driver'));
        
    }
    public function store(Request $request)
  {
    $validator = Validator::make($request->all(),[
     
        'name'  => 'required',
        'jeniskendaraan'  => 'required',
        'mobil'  => 'required',
        'bahanbakar'  => 'required',
        
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors());
    }

    $driver = new Driver();
    $driver -> name   = $request -> name;
    $driver -> jeniskendaraan   = $request -> jeniskendaraan;
    $driver -> mobil   = $request -> mobil;
    $driver -> bahanbakar   = $request -> bahanbakar;


    $driver->save();

    return redirect()->back()->with('success','driver ditambah successfully');
    
  }

  public function getAll()
  {
       $driver= Driver::all();


       return view('Driver.index',['driver']);
     
  }

  public function getById($driver_id)
  {
     $driver = Driver::where('driver_id', '=', $driver_id)->first();
        
     return view('Driver.index',['driver']);

  }

  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(),[
        'name'  => 'required',
        'jeniskendaraan'  => 'required',
        'mobil'  => 'required',
        'bahanbakar'  => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors());
    }

     $driver = Driver::where('driver_id', '=', $driver_id)->first();
     $driver -> name   = $request -> name;
     $driver -> jeniskendaraan   = $request -> jeniskendaraan;
     $driver -> mobil   = $request -> mobil;
     $driver -> bahanbakar   = $request -> bahanbakar;


    
     $driver->save();

     
     return redirect()->back()->with('success','driver diubah successfully');
  }

 public function destroy($driver_id)
    {
        $delete = Driver::where('driver_id', '=', $driver_id)->delete();

        return redirect()->back()->with('success', 'driver Deleted Successfully');
}
}
