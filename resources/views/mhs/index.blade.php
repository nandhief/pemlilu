@extends('layouts.app')

@section('content')
    <h3 class="page-title">Mahasiswa</h3>
    <p>
        <a href="{{ route('mhs.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped" id="{{ count($mahasiswa) > 0 ? 'datatables' : '' }}">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Fakultas</th>
                        <th>Kode</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
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
                ajax: "{!! route('mhs.index') !!}",
                "deferRender": true,
                columns: [
                    { data: 'no', name: 'no' },
                    { data: 'nim', name: 'nim' },
                    { data: 'name', name: 'name' },
                    { data: 'fakultas', name: 'fakultas' },
                    { data: 'kode', name: 'kode' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@stop
