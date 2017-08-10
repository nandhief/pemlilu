@extends('layouts.app')

@section('content')
    <h3 class="page-title">Mahasiswa</h3>
    {!! Form::model($mhs, ['method' => 'PUT', 'route' => ['mhs.update', $mhs->id]]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
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
    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('mhs.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
    {!! Form::close() !!}
@stop

