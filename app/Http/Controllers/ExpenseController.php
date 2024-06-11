<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ExpenseController extends Controller
{
    public function show(User $user) {
        
    }
    public function ajax(User $user) {
        
    }
    public function store(Request $request) {
        
    }
    public function edit(Expense $expense,Request $request) {
        
    }
    public function update(Request $request) {
        
    }
    public function adminShow() {
        
    }
    public function adminAjax() {
        $expense = Expense::query();
        $expense = $expense->with('driver');

        return DataTables::eloquent($expense)
            ->toJson();
    }
    public function adminStore(Request $request) {
        
    }
    public function adminEdit(Expense $expense, Request $request) {
        
    }
    public function adminUpdate(Request $request) {
        
    }
}
