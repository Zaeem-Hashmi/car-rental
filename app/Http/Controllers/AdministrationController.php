<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdministrationController extends Controller
{
    public function show()
    {
        return view('admin.administration.user.show');
    }
    public function ajax()
    {
        $query = User::query();
        return DataTables::eloquent($query)
            ->toJson();
    }
}
