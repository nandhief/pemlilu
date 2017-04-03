@extends('layouts.app')

@section('content')
    <h3 class="page-title">Calons</h3>
    <p>
        <a href="{{ route('mhs.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($mahasiswa) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Fakultas</th>
                        <th>Kode</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse ($mahasiswa as $mhs)
                        <tr data-entry-id="{{ $mhs->id }}">
                            <td></td>
                            <td>{{ $mhs->nim }}</td>
                            <td>{{ $mhs->name }}</td>
                            <td>{{ $mhs->fakultas }}</td>
                            <td>{{ $mhs->kode or '' }}</td>
                            <td>{{ is_null($mhs->status) ? 'Belum' : ($mhs->status == false ? 'Antri' : 'Sudah') }} Memilih</td>
                            <td>
                                <a href="{{ route('mhs.show',[$mhs->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                <a href="{{ route('mhs.edit',[$mhs->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                    'route' => ['mhs.destroy', $mhs->id])) !!}
                                {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
