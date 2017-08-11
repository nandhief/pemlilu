@extends('layouts.app')

@section('content')
    <h3 class="page-title">Setting</h3>
    {!! Form::model($setting, ['method' => 'PUT', 'route' => ['settings.update', $setting->id]]) !!}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('value', ucwords(str_replace('-', ' ', $setting->name)) . '*', ['class' => 'control-label']) !!}
                    @if ($setting->name == 'cara-memilih')
                        {!! Form::textarea('value', old('value')) !!}
                    @elseif ($setting->name == 'detik')
                        {!! Form::text('value', old('value'), ['class' => 'form-control', 'placeholder' => 'Jumlah detik']) !!}
                    @else
                        {!! Form::text('value', old('value'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    @endif
                    @if($errors->has('value'))
                        <p class="help-block">
                            {{ $errors->first('value') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    <a href="{{ route('settings.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
    {!! Form::close() !!}
@stop

@section('javascript')
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: 'textarea',
                plugins: ['autolink lists'],
                toolbar: 'undo redo | styleselect bold italic | alignleft aligncenter alignright alignjustify | bullist numlist',
                menubar: false,
                statusbar: false,
                paste_data_images: true
            });
        });
    </script>
@stop