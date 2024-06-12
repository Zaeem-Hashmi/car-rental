
@extends('driver.layouts.index')
@section('booking',"active_nav")
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Available Rides</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="available" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Pickup Address</th>
                                        <th>Pickup Date</th>
                                        <th>Pickup Time</th>
                                        <th>Dropoff Address</th>
                                        <th>Dropoff Date</th>
                                        <th>Dropoff Time</th>
                                        <th style="width: 150px">Ride Status</th>
                                        {{-- <th class="text-center">Action</th> --}}
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
                <p class="card-title">Booked Rides</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="booked" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Driver Name</th>
                                        <th>Driver Email</th>
                                        <th>Pickup Address</th>
                                        <th>Pickup Date</th>
                                        <th>Pickup Time</th>
                                        <th>Dropoff Address</th>
                                        <th>Dropoff Date</th>
                                        <th>Dropoff Time</th>
                                        <th style="width: 150px">Ride Status</th>
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
        var table, table2;
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             table = $('#available').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    'url': '{{ route('driver.booking.ajax') }}',
                    'type': 'POST'
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                }, ],
                "columns": [
                    {
                        "data":"passenger.username",
                        "name":"passenger.username"
                    },
                    {
                        "data":"passenger.email",
                        "name":"passenger.email"
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row){
                            return `${row.pickupUnitNumber ? "Unit number: "+row.pickupUnitNumber+"," :'' }${row.pickupStreetNumber ? "Street number: "+row.pickupStreetNumber+"," :'' }${row.pickupStreetName ? "Street name: "+row.pickupStreetName+"," :'' }${row.pickupAreaName ? "Area name: "+row.pickupAreaName+"," :'' }${row.pickupCity ? "Area name: "+row.pickupCity+"," :'' }`
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
                        "render":function(data,type,row){
                            return `${row.dropoffUnitNumber ? "Unit number: "+row.dropoffUnitNumber+"," :'' }${row.dropoffStreetNumber ? "Street number: "+row.dropoffStreetNumber+"," :'' }${row.dropoffStreetName ? "Street name: "+row.dropoffStreetName+"," :'' }${row.dropoffAreaName ? "Area name: "+row.dropoffAreaName+"," :'' }${row.dropoffCity ? "Area name: "+row.dropoffCity+"," :'' }`
                        }
                    },
                    {
                        "data":"dropoffDate"
                    },
                    {
                        "data":"dropoffTime"
                    },
                    {
                        "data":"status",
                        "render":function(data,type,row){
                            return `<select class="form-control" onchange="changeStatus(${row.id})" id="status-${row.id}">
                                <option value="assigned" ${data == "assigned" ? "selected" :""}>Assign</option>
                                <option value="unassigned" ${data == "unassigned" ? "selected" :""}>Unassign</option>
                                </select>`
                        }
                    },
                    // {
                    //     "data":"id",
                    //     "render":function(data,type,row){
                    //         return `<a href="{{ route('user.admin.delete','data') }}" class="text-primary"><i class="fas fa-trash-alt"></i></a>`.replaceAll("data",row.id)
                    //     }
                    // },
                ]
            });
            table2 = $('#booked').DataTable({
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
                        "data":"passenger.username",
                        "name":"passenger.username"
                    },
                    {
                        "data":"passenger.email",
                        "name":"passenger.email"
                    },
                    {
                        "data":"driver.username",
                        "name":"driver.username"
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
                        "data":"status",
                        "render":function(data,type,row){
                            return `<select class="form-control" onchange="changeStatus(${row.id})" id="status-${row.id}">
                                <option value="assigned" ${data == "assigned" ? "selected" :""}>Assign</option>
                                <option value="complete" ${data == "complete" ? "selected" :""}>Complete</option>
                                </select>`
                        }
                    },
                    // {
                    //     "data":"id",
                    //     "render":function(data,type,row){
                    //         return `<a href="#" class="text-primary"><i class="fas fa-trash-alt"></i></a>`
                    //     }
                    // },
                ]
            });
            });
            function changeStatus(id) {
                $.ajaxSetup({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
                });

                $.ajax({
                    method: "POST",
                    url: `{{ route('driver.booking.assign','data') }}`.replaceAll("data",id),
                    data:{
                        "status":$(`#status-${id}`).val(),
                        "booking_id":id,
                        "user":{{ auth()->user()->id }}
                    }
                })
                .done(function(response) {
                   table.ajax.reload();
                   table2.ajax.reload();
                }).fail(function(error) {
                    alert('fail')
                });
            }
    </script>
@endsection
