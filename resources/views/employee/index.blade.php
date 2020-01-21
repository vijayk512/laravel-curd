@extends('layouts.template')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Employee Data</h1>
        <a href="#modal" data-remote="/create" class="btn btn-success btn-sm align-right" data-toggle="modal" data-target="#modal">Add Employee</a>

    </div>

    <div class="table-responsive">
        <table class="table table-striped data-table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name Prefix</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Gender</th>
                <th scope="col">Phone No</th>
                <th scope="col">State</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/data",
                columns: [
                    {data: 'emp_id'},
                    {data: 'name_prefix'},
                    {data: 'first_name'},
                    {data: 'last_name'},
                    {data: 'fullname', searchable: false},
                    {data: 'email'},
                    {data: 'gender'},
                    {data: 'phone_no'},
                    {data: 'state'},
                    {data: 'action', name: 'action'}
                ],
                columnDefs: [
                    {
                        'targets': [ 1, 2, 3 ],
                        'visible': false
                    }
                ]
            });
        });
    </script>
@endsection