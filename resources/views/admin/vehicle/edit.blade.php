
@extends('admin.layouts.index')
@section('vehicle',"active_nav")
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <h2 class="card-title">Edit {{ $vehicle->name }} Vehicle</h2>
              <form class="form-sample" action="{{ route('vehicle.admin.update') }}" method="POST">
                @csrf
                <input type="number" name="id" value="{{ $vehicle->id }}" hidden>
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
                                <option value="{{ $user->id }}" {{ $vehicle->user_id == $user->id ? "selected" : "" }}>{{ $user->username }}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>
                      </div>
                </div>
                <p class="card-description">
                  Vehicle info
                </p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" value="{{ $vehicle->name }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Model</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="model" value="{{ $vehicle->model }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Model Year</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="modelYear" value="{{ $vehicle->modelYear }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Color</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="color" value="{{ $vehicle->color }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Registration Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="regNumber" value="{{ $vehicle->regNumber }}"/>
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