
@extends('admin.layouts.index')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <h2 class="card-title">Edit {{ $driver->username }} Driver</h2>
              <form class="form-sample" action="{{ route('driver.admin.update') }}" method="POST">
                @csrf
                <input type="text" class="form-control" name="id" value="{{ $driver->id }}" hidden>
                <p class="card-description">
                  Personal info
                </p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">User Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" value="{{ $driver->drivername }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" value="{{ $driver->email }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" value=""/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Confirm Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password_confirmation" value=""/>
                      </div>
                    </div>
                  </div>
                </div>
                <p class="card-description">
                  Address
                </p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address 1</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="address_1" value="{{ $driver->address_1}}"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address 2</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="address_2" value="{{ $driver->address_2 }}"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">City</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="city" value="{{ $driver->city }}"/>
                      </div>
                    </div>
                  </div>
                </div>
                <p class="card-description">
                Info    
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lisence Numner</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="lisence_number" value="{{ $driver->lisence_number }}"/>
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