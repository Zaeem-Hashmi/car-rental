
@extends('admin.layouts.index')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome {{ auth()->user()->username }}</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card tale-bg">
            <div class="card-people mt-auto">
                <img src="{{ asset('admin-asset') }}/images/dashboard/people.svg" alt="people" height="400px">
                <div class="weather-info">
                    <div class="d-flex">
                        <div class="ml-2">
                            <h4 class="location font-weight-normal">Pakistan</h4>
                            <h6 class="font-weight-normal">Bahawalpur</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row col-12 grid-margin transparent">
        <div class="col-md-3 mb-4 stretch-card transparent">
            <div class="card card-tale">
                <div class="card-body">
                    <p class="mb-4"><b>Total Booking</b></p>
                    <p class="fs-30 mb-2">{{ App\Models\Booking::count("id") }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="mb-4"><b>Total Expense</b></p>
                    <p class="fs-30 mb-2">{{ App\Models\Expense::count("id") }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4 stretch-card transparent">
            <div class="card card-light-blue">
                <div class="card-body">
                    <p class="mb-4"><b>Total CLients</b></p>
                    <p class="fs-30 mb-2">{{ App\Models\User::where("role_id",3)->count("id") }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4 stretch-card transparent">
            <div class="card card-light-danger">
                <div class="card-body">
                    <p class="mb-4"><b>Total Drivers</b></p>
                    <p class="fs-30 mb-2">{{ App\Models\User::where("role_id",2)->count("id") }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Bookings</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="booking" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Passenger Email</th>
                                        <th>Driver Email</th>
                                        <th>Pickup Address</th>
                                        <th>Pickup Date</th>
                                        <th>Pickup Time</th>
                                        <th>Dropoff Address</th>
                                        <th>Dropoff Date</th>
                                        <th>Dropoff Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Expense</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="expense" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Driver Email</th>
                                        <th>Expense Type</th>
                                        <th>Expense Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Users</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="user" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Type</th>
                                        <th>Is Available</th>
                                        <th>Blocked</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#booking').dataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    'url': '{{ route('admin.booking.ajax') }}',
                    'type': 'POST'
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                }, ],
                "columns": [
                    {
                        "data":"passenger.email",
                        "name":"passenger.email"
                    },
                    {
                        "data":"driver.email",
                        "name":"driver.email"
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row) {
                            return `Street Number ${row.dropoffStreetNumber}, House Number ${row.dropoffUnitNumber}, Street name ${row.pickupStreetName}, ${row.dropoffAreaName}, ${row.dropoffCity}`;
                        }
                    },
                    {
                        "data":"pickupDate"
                    },
                    {
                        "data":"pickupTime"
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row) {
                            return `Street Number ${row.pickupStreetNumber}, House Number ${row.pickupUnitNumber}, Street name ${row.pickupStreetName}, ${row.pickupAreaName}, ${row.pickupCity}`;
                        }
                    },
                    {
                        "data":"dropoffDate"
                    },
                    {
                        "data":"dropoffTime"
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row){
                            return `<a href="#" class="text-primary"><i class="fas fa-edit"></i></a> <a href="#" class="text-primary"><i class="fas fa-trash-alt"></i></a>`
                        }
                    },
                ]
            });

            $('#expense').dataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    'url': '{{ route('admin.expense.ajax') }}',
                    'type': 'POST'
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                }, ],
                "columns": [
                    {
                        "data":"driver.email",
                        "name":"driver.email"
                    },
                    {
                        "data":"expenseType",
                    },
                    {
                        "data":"expenseAmount",
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row){
                            return `<a href="#" class="text-primary"><i class="fas fa-edit"></i></a> <a href="#" class="text-primary"><i class="fas fa-trash-alt"></i></a>`
                        }
                    },
                ]
            });
            $('#user').dataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    'url': '{{ route('user.admin.ajax') }}',
                    'type': 'POST'
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                }, ],
                "columns": [
                    {
                        "data":"username",
                        "name":"username"
                    },
                    {
                        "data":"email",
                        "name":"email"
                    },
                    {
                        "data":"role_id",
                        "render":function (data,type,row){
                            if (data == 1) {
                                return `<button class="btn btn-primary btn-sm rounded-pill">Admin</button>`
                            }
                            if (data == 2) {
                                return `<button class="btn btn-success btn-sm rounded-pill">Driver</button>`
                            }
                            if (data == 3) {
                                return `<button class="btn btn-warning btn-sm rounded-pill">Passenger</button>`
                            }
                        }
                    },
                    {
                        "data":"is_available",
                        "render":function(data,type,row){
                            return `<input type="checkbox" ${ data? "checked":'' }>`
                        }
                    },
                    {
                        "data":"blocked",
                        "render":function(data,type,row){
                            return `<input type="checkbox" ${ data? "checked":'' }>`
                        }
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row){
                            return `<a href="#" class="text-primary"><i class="fas fa-edit"></i></a> <a href="#" class="text-primary"><i class="fas fa-trash-alt"></i></a>`
                        }
                    },
                ]
            });
        });
    </script>
@endsection