<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pemilu Raya Universitas Semarang</title>
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
                margin: 0px auto;
            }
            .panel {
                background-color: rgba(255,255,255, 0.1);
                border-radius: 0px;
            }
            .height {
                height: auto;
            }
        </style>
    </head>
    <body>
        <h1 class="text-center white" style="margin: 10px auto; padding-top: 15px; padding-bottom: 5px;"> PEMILU RAYA UNIVERSITAS SEMARANG </h1>
        <hr class="white">
        <h2 class="white text-center"><strong style="border-bottom: 1px solid #fff;">SELAMAT DATANG</strong></h2>
        <p class="white text-center" style="font-weight: 700; font-size: 18px;"><span style="border-bottom: 1px solid #fff;">{{ is_null($mhs) ? '' : $mhs->name }}</span></p>
        {{-- <h4 class="white text-center"><strong>Gunakan HAK Suara Anda Untuk Memilih</strong></h4> --}}
        <div class="container">
            <div class="row">
                @if (is_null($mhs))
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body height">
                            <h3 class="white text-center" style="border-bottom: 1px solid #fff;">Lorem ipsum dolor.</h3>
                            {{ Form::open(['route' => 'home', 'method' => 'GET']) }}
                                <div class="form-group">
                                    {{-- <div class="input-group"> --}}
                                        <input type="text" name="kode" class="form-control" placeholder="Masukkan Kode, Contoh: 1234" autofocus="">
                                        {{-- <span class="input-group-btn">
                                            <button type="submit" class="btn btn-success">Masuk</button>
                                        </span>
                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    {{-- <div class="input-group">
                                        <input type="text" name="kode" class="form-control" placeholder="Masukkan Kode, Contoh: 1234" autofocus="">
                                        <span class="input-group-btn"> --}}
                                            <button type="submit" class="btn btn-success">Masuk</button>
                                        {{-- </span>
                                    </div> --}}
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body height white">
                            <h3 style="border-bottom: 1px solid #fff;">Lorem ipsum dolor sit amet.</h3>
                            <ol>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto ducimus distinctio consequuntur, ipsam aperiam, hic similique. Rerum quos id officiis, repellendus! Aperiam vitae ipsa quisquam non animi cupiditate facilis nostrum?</li>
                                <li>Dicta voluptatibus commodi dolorum aliquid odit dolore temporibus quidem tempora doloribus rerum tempore, natus omnis voluptas architecto aperiam, molestias dolor earum aspernatur voluptate. Eum aperiam, repellendus in iure, sed consequuntur.</li>
                                <li>Labore ex, quos ut autem aspernatur reprehenderit, sed eligendi, fuga eum maiores sapiente fugiat libero corporis perferendis dolor quibusdam natus? Molestias aliquam voluptas omnis, aliquid quisquam dolorum rem reiciendis assumenda!</li>
                                <li>Enim similique itaque saepe quae porro magnam quibusdam rerum ipsa fuga aut, natus laborum totam ipsum aliquid maiores alias dolor, debitis quasi ut laudantium. Tempora asperiores, magnam temporibus accusantium officiis.</li>
                                <li>Illum impedit expedita, aliquam, quod ducimus quaerat assumenda aperiam quam, dicta incidunt totam modi quae nobis quos provident error! Sapiente maiores enim in porro dignissimos vel autem fugiat, voluptas consequuntur.</li>
                            </ol>
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
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <img src="{{ asset('uploads/'.$calon->image) }}" alt="" class="tengah img-responsive img-thumbs">
                                    <h4 class="text-center white"><strong>KETUA</strong></h4>
                                    <p class="text-center white"><b>{{ $calon->name }}</b></p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
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
            <h3 class="white text-center">WAKTU MEMILIH</h3>
            <h3 class="text-center white" id="time"></h3>
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
                var menitan = 60 * 1,
                    display = document.querySelector('#time');
                startTimer(menitan, display);
            };
            $(document).ready(function () {
                setTimeout(function () {
                    $.post("{{ route('golput') }}", {id: "{{ $mhs->id }}"});
                    setTimeout(function () {
                        window.location.href = "{{ route('home') }}";
                    }, 2000);
                }, 58000);
            });
            @endif
        </script>
    </body>
</html>
