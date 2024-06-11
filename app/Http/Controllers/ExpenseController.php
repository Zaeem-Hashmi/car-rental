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
        return view('admin.expense.list');
    }
    public function adminAjax() {
        $expense = Expense::query();
        $expense = $expense->with('driver');

        return DataTables::eloquent($expense)
            ->toJson();
    }
    public function adminCreate() {
        return view('admin.expense.create');
    }
    public function adminStore(Request $request) {
        $validate = $this->validate($request,[
            'user_id'=>'required | integer',
            'expenseType' => 'required| string',
            'expenseAmount' => 'required',
        ]);
        $expense = Expense::create($request->except("_token"));
        return redirect()->route('admin.expense.show')->with("alert-success","Expense has been created successfully.");

    }
    public function adminEdit(Expense $expense, Request $request) {
        return view('admin.expense.edit',compact('expense'));
    }
    public function adminUpdate(Request $request) {
        $expense = Expense::find($request->id);
        $validate = $this->validate($request,[
            'user_id'=>'required | integer',
            'expenseType' => 'required| string',
            'expenseAmount' => 'required',
        ]);
        $expense = $expense->update($request->except("_token"));
        return redirect()->route('admin.expense.show')->with("alert-success","Expense has been updated successfully.");
    }
    public function adminDelete(Expense $expense) {
        $expense->delete();
        return redirect()->route('admin.expense.show')->with("alert-success","Expense has been deleted successfully.");   
    }
}
