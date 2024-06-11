
@extends('admin.layouts.index')
@section('administration',"active_nav")
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('user.admin.create') }}" class="btn btn-sm btn-primary rounded mb-3 d-block ml-auto" style="width: 90px">Create <i class="fas fa-plus" style="font-size: 10px"></i></a>
                <p class="card-title">Users</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="driver" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Availability</th>
                                        <th>Blocked</th>
                                        <th>User Role</th>
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
                    'url': '{{ route('administaration.user.ajax') }}',
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
                        "data":"role_id",
                        "render":function(data,type,row){
                            return `${data}`
                        }
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row){
                            return `<a href="{{ route('user.admin.edit','data') }}" class="text-primary"><i class="fas fa-edit"></i></a> <a href="{{ route('user.admin.delete','data') }}" class="text-primary"><i class="fas fa-trash-alt"></i></a>`.replaceAll("data",row.id)
                        }
                    },
                ]
            });
        });
    </script>
@endsection