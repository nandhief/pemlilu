@inject('set', 'App\Setting')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        @if (is_null($mhs))
        <meta http-equiv="refresh" content="120">
        @endif
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ ucwords($set->whereName('title')->first()->value) }}</title>
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <style>
            body {
                background: url({{ asset('uploads/b1.jpg') }}) no-repeat center top;
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                min-height: 700px;
                background-attachment: fixed;
            }
            h1 {
                font-size: 43px;
                font-weight: 700;
                text-transform: uppercase;
                color: #fff;
                word-spacing: 11px;
                letter-spacing: 6px;
                margin: 1.1em 0;
                text-align: center;
            }
            .white {
                color: #fff;
            }
            .tengah {
                width: 200px;
                margin: 0px auto;
            }
            .panel {
                background-color: rgba(0, 0, 0, 0.5);
                border-radius: 0px;
            }
            .height {
                min-height: 400px;
            }
            .form-control, .alert, .btn, .modal-content {
                border-radius: 0px;
            }
            .content {
                line-height: 1.5;
            }
        </style>
    </head>
    <body>
        <h1 class="text-center white" style="margin: 10px auto; padding-top: 15px; padding-bottom: 5px;">{{ strtoupper($set->whereName('header')->first()->value) }}<br> UNIVERSITAS SEMARANG</h1>
        <hr class="white">
        {{-- <h2 class="white text-center"><strong style="border-bottom: 1px solid #fff;">SELAMAT DATANG</strong></h2> --}}
        <p class="white text-center" style="font-weight: 700; font-size: 32px;"><span style="border-bottom: 1px solid #fff;">{{ is_null($mhs) ? '' : ucwords($mhs->name) }}</span></p>
        {{-- <h4 class="white text-center"><strong>Gunakan HAK Suara Anda Untuk Memilih</strong></h4> --}}
        <div class="container">
            <div class="row">
                @if (is_null($mhs))
                <div class="col-md-4 col-sm-4 col-xs-12">
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong> {{ session()->get('error') }}.
                    </div>
                @endif
                    <div class="panel panel-default">
                        <div class="panel-body height">
                            <h2 class="white text-center" style="border-bottom: 1px solid #fff;">Kode Pemilih</h2>
                            {{ Form::open(['route' => 'home', 'method' => 'GET']) }}
                                <div class="form-group">
                                    <input type="text" name="kode" class="form-control" placeholder="Masukkan Kode, Contoh: 1234" autofocus="" required title="Mohon Diisi">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block">Masuk</button>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body height white">
                            <h2 style="border-bottom: 1px solid #fff;">Tata Cara Pemilihan</h2>
                            <h3 class="content">
                            {!! $set->whereName('cara-memilih')->first()->value !!}
                            </h3>
                        </div>
                    </div>
                </div>
                @else
                @php
                    $no = 1;
                @endphp
                @foreach ($calons as $calon)
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::open(['route' => ['memilih', $calon->id, $mhs->id], 'method' => 'POST']) }}
                    <div class="panel panel-default">
                        <a href="#modal{{ $calon->id }}" data-toggle="modal" data-target="#modal{{ $calon->id }}">
                        <div class="panel-body">
                            <p class="white text-center"><span style="font-size: 32px; font-weight: 700; margin: 5px; padding: 10px 20px; border-radius: 50%; background: #acacac;">{{ $no }}</span></p>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="{{ asset('uploads/'.$calon->image) }}" alt="" class="tengah img-responsive img-thumbs">
                                    <h4 class="text-center white"><strong>KETUA</strong></h4>
                                    <p class="text-center white"><b>{{ $calon->name }}</b></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <img src="{{ asset('uploads/'.$calon->wimage) }}" alt="" class="tengah img-responsive img-thumbs">
                                    <h4 class="text-center white"><strong>WAKIL</strong></h4>
                                    <p class="text-center white"><b>{{ $calon->wname }}</b></p>
                                </div>
                            </div>
                        </div>
                        </a>
                        <div class="modal fade" id="modal{{ $calon->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $calon->id }}Label">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title text-center" id="modal{{ $calon->id }}Label">Anda Yakin Memilih No {{ $no }}</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <img src="{{ asset('uploads/'.$calon->image) }}" alt="" class="img-responsive">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <img src="{{ asset('uploads/'.$calon->wimage) }}" alt="" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Yakin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
                @php
                    $no++;
                @endphp
                @endforeach
                @endif
            </div>
            @if (!is_null($mhs))
            <h2 class="white text-center">WAKTU MEMILIH : <span id="time"></span></h2>
            @endif
        </div>

        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script>
            @if (!is_null($mhs))
            function startTimer(duration, display) {
                var timer = duration, minutes, seconds;
                setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;
                    display.textContent = minutes + ":" + seconds;
                    if (--timer < 0) {
                        timer = duration;
                    }
                }, 1000);
            }
            window.onload = function () {
                var menitan = {{ intval($set->whereName('detik')->first()->value) }} * 1,
                    display = document.querySelector('#time');
                startTimer(menitan, display);
            };
            @endif
            $(document).ready(function () {
                @if (is_null($mhs))
                $(".alert").fadeTo(4000, 1).slideUp(500, function () {
                    $(this).slideUp(500);
                    setTimeout(function () {
                        window.location.href = "{{ route('home') }}";
                    }, 2000);
                });
                @endif
                @if (!is_null($mhs))
                setTimeout(function () {
                    $.post("{{ route('golput') }}", {id: "{{ $mhs->id }}"});
                    setTimeout(function () {
                        window.location.href = "{{ route('home') }}";
                    }, 2000);
                }, {{ intval($set->whereName('detik')->first()->value - 2) }}000);
                @endif
            });
        </script>
    </body>
</html>

