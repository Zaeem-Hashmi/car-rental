<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function show()
    {
        return view('admin.user.list');
    }
    public function ajax()
    {
        $query = User::query();
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'username' => 'required',
            'password' => 'required|confirmed|min:6',
            'email' => 'required',
        ]);
        $user = User::create($request->except("_token", "password_confirmation"));
        return redirect()->route('user.admin.show')->with("alert-success", $user->username . " has been created successfully.");
    }
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $validate = $this->validate($request, [
            'username' => 'required',
            'password' => 'required|confirmed|min:6',
            'email' => 'required',
        ]);
        $user = $user->update($request->except("_token", "password_confirmation"));
        return redirect()->route('user.admin.show')->with("alert-success", $request->username . " has been updated successfully.");
    }
    public function delete(User $user)
    {
        if ($user) {
            $user->delete();
        }
        return redirect()->route('user.admin.show')->with("alert-success", $user->username . " has been deleted successfully.");
    }
}
