@extends('layouts.app')

@section('content')
    <h3 class="page-title">Calons</h3>
    <p>
        <a href="{{ route('calons.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($calons) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse ($calons as $calon)
                        <tr data-entry-id="{{ $calon->id }}">
                            <td></td>
                            <td>{{ $calon->name }}</td>
                            <td><a href="{!! url('uploads/'.$calon->image) !!}"></a>{!! $calon->image !!}</td>
                            <td>{{ is_null($calon->parent_id) ? 'Ketua' : 'Wakil' }}</td>
                            <td>
                                <a href="{{ route('calons.show',[$calon->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                <a href="{{ route('calons.edit',[$calon->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                    'route' => ['calons.destroy', $calon->id])) !!}
                                {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
