@extends('layouts.app')

@section('content')
    <h3 class="page-title">Mahasiswa</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>NIM</th>
                            <td>{{ $mhs->nim }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $mhs->name }}</td>
                        </tr>
                        <tr>
                            <th>Fakultas</th>
                            <td>{{ $mhs->fakultas }}</td>
                        </tr>
                        <tr>
                            <th>Kode</th>
                            <td>{{ $mhs->kode }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ is_null($mhs->status) ? 'Belum' : ($mhs->status == false ? 'Antri' : 'Sudah') }} Memilih</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('mhs.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop