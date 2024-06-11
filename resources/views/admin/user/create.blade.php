
@extends('admin.layouts.index')
@section('user',"active_nav")
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <h2 class="card-title">Create New User</h2>
              <form class="form-sample" action="{{ route('user.admin.store') }}" method="POST">
                @csrf
                <p class="card-description">
                  Personal info
                </p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">User Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="username"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" name="email"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Confirm Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password_confirmation"/>
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