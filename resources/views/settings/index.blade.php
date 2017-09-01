@extends('layouts.app')

@section('content')
    <h3 class="page-title">Settings</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list') Pengaturan
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($settings) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse ($settings as $set)
                        @if (strtolower(auth()->user()->roles()->first()->title) == 'pengawas')
                            @if ($set->name != 'count')
                                <tr>
                                    <td>{{ ucwords(str_replace('-', ' ', $set->name)) }}</td>
                                    <td>{!! $set->value !!}</td>
                                    <td>
                                        <a href="{{ route('settings.edit',[$set->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td>{{ ucwords(str_replace('-', ' ', $set->name)) }}</td>
                                <td>{!! $set->value !!}</td>
                                <td>
                                    <a href="{{ route('settings.edit',[$set->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                </td>
                            </tr>
                        @endif
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
