@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    
    {!! Form::model($calon, ['method' => 'PUT', 'route' => ['calons.update', $calon->id], 'files' => true, ]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Nama Ketua*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('image', 'Foto Ketua*', ['class' => 'control-label']) !!}
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                    @if($errors->has('image'))
                        <p class="help-block">
                            {{ $errors->first('image') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('wname', 'Nama Wakil*', ['class' => 'control-label']) !!}
                    {!! Form::text('wname', old('wname'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    @if($errors->has('wname'))
                        <p class="help-block">
                            {{ $errors->first('wname') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('wimage', 'Foto Wakil*', ['class' => 'control-label']) !!}
                    {!! Form::file('wimage', ['class' => 'form-control']) !!}
                    @if($errors->has('wimage'))
                        <p class="help-block">
                            {{ $errors->first('wimage') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

