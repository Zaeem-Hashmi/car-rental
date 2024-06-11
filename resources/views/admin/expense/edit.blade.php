@extends('admin.layouts.index')
@section('expense',"active_nav")
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <h2 class="card-title">Edit Expense</h2>
              <form class="form-sample" action="{{ route('admin.expense.update') }}" method="POST">
                @csrf
                <input type="number" value="{{ $expense->id }}" name="id" hidden>
                <p class="card-description">
                    Driver Info
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Driver</label>
                          <div class="col-sm-9">
                            <select class="js-example-basic-single w-100" name="user_id">
                                @foreach(App\Models\User::where("role_id",2)->get() as $user)
                                <option value="{{ $user->id }}" {{ $expense->user_id == $user->id ? "selected" : ""  }}>{{ $user->username }}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>
                      </div>
                </div>
                <p class="card-description">
                  Expense Description
                </p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Expense type</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="expenseType" value="{{ $expense->expenseType }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Expense Amount</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="expenseAmount" value="{{ $expense->expenseAmount }}"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Expense Description</label>
                      <div class="col-sm-9">
                        <textarea name="expenseDescription" cols="30" rows="10" class="form-control">{{ $expense->expenseDescription }}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-outline-primary rounded-pill mx-auto d-block btn-sm shadow">Submit</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin-asset') }}/js/select2.js"></script>
    <script>
        $(document).ready(function() {
           
        });
    </script>
@endsection