@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nama Ketua</th>
                            <td>{{ $calon->name }}</td>
                        </tr>
                        <tr>
                            <th>Foto Ketua</th>
                            <td>
                                <img src="{{ url('uploads/'.$calon->image) }}" alt="{{ $calon->image }}" class="img-responsive img-thumbnail">
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Wakil</th>
                            <td>{{ $calon->wname }}</td>
                        </tr>
                        <tr>
                            <th>Foto Wakil</th>
                            <td>
                                <img src="{{ url('uploads/'.$calon->wimage) }}" alt="{{ $calon->wimage }}" class="img-responsive img-thumbnail">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('calons.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop