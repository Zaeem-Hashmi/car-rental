<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Driver;
use Yajra\DataTables\Facades\DataTables;

class DriverController extends Controller
{
    public function show()
    {
        return view('admin.driver.list');
    }
    public function ajax()
    {
        $query = User::query();
        $query = $query->where("role_id", 2);
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function create()
    {
        return view('admin.driver.create');
    }
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
            'username'=>'required',
            'password' => 'required|confirmed|min:6',
            'email' => 'required',
        ]);
        $request["role_id"] = 2;
        $driver = User::create($request->except("_token","password_confirmation"));
        return redirect()->route('driver.admin.show')->with("alert-success",$driver->username." has been created successfully.");

    }
    public function edit(User $driver)
    {
        return view('admin.driver.edit',compact('driver'));
    }
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $validate = $this->validate($request,[
            'username'=>'required',
            'password' => 'required|confirmed|min:6',
            'email' => 'required',
        ]);
        $driver = $user->update($request->except("_token","password_confirmation"));
        return redirect()->route('driver.admin.show')->with("alert-success",$request->username." has been created successfully.");
    }
    public function delete(User $driver)
    {
        if ($driver) {
           $driver->delete();
        }
        return redirect()->route('driver.admin.show')->with("alert-success",$driver->username." has been deleted successfully.");
    }
}
