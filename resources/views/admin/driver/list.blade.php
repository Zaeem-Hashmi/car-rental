
@extends('admin.layouts.index')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('driver.admin.create') }}" class="btn btn-sm btn-primary rounded mb-3 d-block ml-auto" style="width: 90px">Create <i class="fas fa-plus" style="font-size: 10px"></i></a>
                <p class="card-title">Driver</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="driver" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Availability</th>
                                        <th >Blocked</th>
                                        <th class="text-center">Address</th>
                                        <th>Lisence No#</th>
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
                    'url': '{{ route('driver.admin.ajax') }}',
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
                            if (row.address_1) {
                                return `${row.address_2 ? row.address_1+"," : row.address_1} ${row.city ? row.address_2+"," : row.address_2} ${row.city} `
                            }
                            return "";
                        }
                    },
                    {
                        "data":"lisence_number",
                        "name":"lisence_number"
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row){
                            return `<a href="{{ route('driver.admin.edit','data') }}" class="text-primary"><i class="fas fa-edit"></i></a> <a href="{{ route('driver.admin.delete','data') }}" class="text-primary"><i class="fas fa-trash-alt"></i></a>`.replaceAll("data",row.id)
                        }
                    },
                ]
            });
        });
    </script>
@endsection