@extends('layouts.app')

@section('content')
    <h3 class="page-title">Mahasiswa</h3>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#insert" data-toggle="tab">Tambah</a></li>
        <li><a href="#import" data-toggle="tab">Import</a></li>
    </ul>

    <div class="tab-content">
        <div id="insert" class="tab-pane fade in active">
    {!! Form::open(['method' => 'POST', 'route' => ['mhs.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nim', 'NIM*', ['class' => 'control-label']) !!}
                    {!! Form::text('nim', old('nim'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    @if($errors->has('nim'))
                        <p class="help-block">
                            {{ $errors->first('nim') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Nama*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('fakultas', 'Fakultas*', ['class' => 'control-label']) !!}
                    {!! Form::text('fakultas', old('fakultas'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    @if($errors->has('fakultas'))
                        <p class="help-block">
                            {{ $errors->first('fakultas') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
        </div>
        <div id="import" class="tab-pane fade in">
            <br>
            {!! Form::open(['method' => 'POST', 'route' => ['mhs.store'], 'files' => 'true']) !!}
                <div class="form-group">
                    <label for="">Import File</label>
                    <input type="file" name="mhs" id="mhs">
                </div>
                <div class="form-group">
                    <button type="submit" name="simpan" class="btn btn-danger"><i class="fa fa-upload"></i> Import</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

