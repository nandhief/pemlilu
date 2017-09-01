@extends('layouts.app')

@section('content')
    <h3 class="page-title">Log User</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped" id="datatables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                        <th>Target</th>
                        <th>Target ID</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            $("#datatables").dataTable({
                ajax: "{!! route('log') !!}",
                "deferRender": true,
                columns: [
                    { data: 'no', name: 'no' },
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action' },
                    { data: 'action_model', name: 'action_model' },
                    { data: 'action_id', name: 'action_id' }
                ],
                retrieve: true,
                dom: 'Bfrtip<"actions">',
                buttons: [
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]
            });
        });
    </script>
@stop
