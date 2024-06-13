
@extends('driver.layouts.index')
@section('vehicle',"active_nav")
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('vehicle.driver.create') }}" class="btn btn-sm btn-primary rounded mb-3 d-block ml-auto" style="width: 90px">Create <i class="fas fa-plus" style="font-size: 10px"></i></a>
                <p class="card-title">Vehicles</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="driver" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Driver Name</th>
                                        <th>Driver Email</th>
                                        <th>Car Name</th>
                                        <th>Car Model</th>
                                        <th>Car Year</th>
                                        <th>Car Reg# </th>
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#driver').dataTable({
                'processing': true,
                'serverSide': true,
                'ajax': {
                    'url': '{{ route('vehicle.driver.ajax') }}',
                    'type': 'POST'
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                }, ],
                "columns": [
                    {
                        "data":"driver.username",
                        "name":"driver.username"
                    },
                    {
                        "data":"driver.email",
                        "name":"driver.email"
                    },
                    {
                        "data":"name",
                    },
                    {
                        "data":"model",
                    },
                    {
                        "data":"modelYear",
                    },
                    {
                        "data":"regNumber",
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row){
                            return `<a href="{{ route('vehicle.driver.edit','data') }}" class="text-primary"><i class="fas fa-edit"></i></a> <a href="{{ route('vehicle.driver.delete','data') }}" class="text-primary"><i class="fas fa-trash-alt"></i></a>`.replaceAll("data",row.id)
                        }
                    },
                ]
            });
        });
    </script>
@endsection