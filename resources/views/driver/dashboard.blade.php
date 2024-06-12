
@extends('driver.layouts.index')
@section('dashboard',"active_nav")
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
        <div class="col-md-4 mb-4 stretch-card transparent">
            <div class="card card-tale">
                <div class="card-body">
                    <p class="mb-4"><b>Total Booking</b></p>
                    <p class="fs-30 mb-2">{{ App\Models\Booking::where("driver_id",auth()->user()->id)->count("id") }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="mb-4"><b>Total Expense</b></p>
                    <p class="fs-30 mb-2">{{ App\Models\Expense::where("user_id",auth()->user()->id)->count("id") }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4 stretch-card transparent">
            <div class="card card-light-blue">
                <div class="card-body">
                    <p class="mb-4"><b>Total Vehicles</b></p>
                    <p class="fs-30 mb-2">{{ App\Models\Vehicle::where("user_id",auth()->user()->id)->count("id") }}</p>
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
                                        {{-- <th>Action</th> --}}
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
                    'url': '{{ route('driver.booking.user.ajax') }}',
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
                    // {
                    //     "data":"id",
                    //     "render":function(data,type,row){
                    //         return `<a href="#" class="text-primary"><i class="fas fa-edit"></i></a> <a href="#" class="text-primary"><i class="fas fa-trash-alt"></i></a>`
                    //     }
                    // },
                ]
            });

            $('#expense').dataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    'url': '{{ route('driver.expense.ajax') }}',
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
        });
    </script>
@endsection