
@extends('admin.layouts.index')
@section('show',"active_nav")
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Booked Rides</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="driver" class="display expandable-table" style="width:100%">
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
                                        <th class="text-center">Action</th>
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
                <p class="card-title">Available rides</p>
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
                                        <th class="text-center">Action</th>
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
                <p class="card-title">Cancel rides</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="cancel" class="display expandable-table" style="width:100%">
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
                                        <th class="text-center">Action</th>
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
        var table, table2, table3;
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             table = $('#driver').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    'url': '{{ route('admin.booking.ajax') }}',
                    'type': 'POST',
                    'data':{
                        'type':"booked"
                    }
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
                                <option value="complete" ${data == "complete" ? "selected" :""}>Complete</option>
                                <option value="cancel" ${data == "cancel" ? "selected" :""}>Cancel</option>
                                </select>`
                        }
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row){
                            return `<a href="{{ route('user.admin.delete','data') }}" class="text-primary"><i class="fas fa-trash-alt"></i></a>`.replaceAll("data",row.id)
                        }
                    },
                ]
            });
            table2 = $('#available').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    'url': '{{ route('admin.booking.ajax') }}',
                    'type': 'POST',
                    'data':{
                        "type":"unassigned",
                    }
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
                                <option value="unassigned" ${data == "unassigned" ? "selected" :""}>Unassign</option>
                                <option value="cancel" ${data == "cancel" ? "selected" :""}>Cancel</option>
                                </select>`
                        }
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row){
                            return `<a href="{{ route('user.admin.delete','data') }}" class="text-primary"><i class="fas fa-trash-alt"></i></a>`.replaceAll("data",row.id)
                        }
                    },
                ]
            });
            table3 = $('#cancel').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    'url': '{{ route('admin.booking.ajax') }}',
                    'type': 'POST',
                    'data':{
                        "type":"cancel",
                    }
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
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row){
                            return `<a href="{{ route('user.admin.delete','data') }}" class="text-primary"><i class="fas fa-trash-alt"></i></a>`.replaceAll("data",row.id)
                        }
                    },
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
                    url: `{{ route('admin.booking.status') }}`,
                    data:{
                        "status":$(`#status-${id}`).val(),
                        "booking_id":id
                    }
                })
                .done(function(response) {
                   table.ajax.reload();
                   table2.ajax.reload();
                   table3.ajax.reload();
                }).fail(function(error) {
                    alert('fail')
                });
            }
    </script>
@endsection
