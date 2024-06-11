
@extends('admin.layouts.index')
@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.expense.create') }}" class="btn btn-sm btn-primary rounded mb-3 d-block ml-auto" style="width: 90px">Create <i class="fas fa-plus" style="font-size: 10px"></i></a>
                <p class="card-title">Expense</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="expense" class="display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Expense Type</th>
                                        <th>Expense Amount</th>
                                        <th>Expense Description</th>
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
            $('#expense').dataTable({
                "dom": 'Bfrtip',
                "buttons": [{
                    "extend": 'excelHtml5',
                    "filename": "expense",
                    "exportOptions": {
                        columns: [0,1,2,3,4]
                    }
                }, {
                    "extend": 'csv',
                    "filename": "expense",
                    "exportOptions": {
                        columns: [0,1,2,3,4]
                    }
                }],
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
                        "data":"driver.username",
                        "name":"driver.username"
                    },
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
                        "data":"expenseDescription",
                    },
                    {
                        "data":"id",
                        "render":function(data,type,row){
                            return `<a href="{{ route('admin.expense.edit','data') }}" class="text-primary"><i class="fas fa-edit"></i></a> <a href="{{ route('admin.expense.delete','data') }}" class="text-primary"><i class="fas fa-trash-alt"></i></a>`.replaceAll("data",row.id)
                        }
                    },
                ]
            });
        });
    </script>
@endsection