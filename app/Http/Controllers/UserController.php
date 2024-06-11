<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function show() {
        
    }
    public function ajax() {
        $query = User::query();
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function store(Request $request) {
        
    }
    public function edit(User $user, Request $request) {
        
    }
    public function update(Request $request) {
        
    }
}
