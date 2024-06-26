<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    public function show()
    {
        return view('admin.vehicle.list');
    }
    public function ajax()
    {
        $query = Vehicle::query();
        $query = $query->with("driver");
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function create()
    {
        return view('admin.vehicle.create');
    }
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
            'name'=>'required',
            'user_id'=>'required',
        ]);
        $vehicle = Vehicle::create($request->except("_token"));
        return redirect()->route('vehicle.admin.show')->with("alert-success",$vehicle->name." has been created successfully.");

    }
    public function edit(Vehicle $vehicle)
    {
        return view('admin.vehicle.edit',compact('vehicle'));
    }
    public function update(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        $validate = $this->validate($request,[
            'name'=>'required',
            'user_id'=>'required',
        ]);
        $vehicle = $vehicle->update($request->except("_token"));
        return redirect()->route('vehicle.admin.show')->with("alert-success",$request->name." has been updated successfully.");
    }
    public function delete(Vehicle $vehicle)
    {
        if ($vehicle) {
           $vehicle->delete();
        }
        return redirect()->route('vehicle.admin.show')->with("alert-success",$vehicle->name." has been deleted successfully.");
    }

    public function driverShow()
    {
        return view('driver.vehicle.list');
    }
    public function driverAjax()
    {
        $query = Vehicle::query();
        $query = $query->where("user_id",auth()->user()->id);
        $query = $query->with("driver");
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function driverCreate()
    {
        return view('driver.vehicle.create');
    }
    public function driverStore(Request $request)
    {
        $validate = $this->validate($request,[
            'name'=>'required',
            'user_id'=>'required',
        ]);
        $vehicle = Vehicle::create($request->except("_token"));
        return redirect()->route('vehicle.driver.show')->with("alert-success",$vehicle->name." has been created successfully.");

    }
    public function driverEdit(Vehicle $vehicle)
    {
        return view('driver.vehicle.edit',compact('vehicle'));
    }
    public function driverUpdate(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        $validate = $this->validate($request,[
            'name'=>'required',
            'user_id'=>'required',
        ]);
        $vehicle = $vehicle->update($request->except("_token"));
        return redirect()->route('vehicle.driver.show')->with("alert-success",$request->name." has been updated successfully.");
    }
    public function driverDelete(Vehicle $vehicle)
    {
        if ($vehicle) {
           $vehicle->delete();
        }
        return redirect()->route('vehicle.driver.show')->with("alert-success",$vehicle->name." has been deleted successfully.");
    }
}
