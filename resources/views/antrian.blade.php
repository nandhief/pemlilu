@inject('set', 'App\Setting')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="120">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Antrian</title>
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
            table {
                font-size: 30px;
            }
        </style>
    </head>
    <body>
        <h1 class="text-center white" style="margin: 10px auto; padding-top: 15px; padding-bottom: 5px;">{{ strtoupper($set->whereName('header')->first()->value) }}<br> UNIVERSITAS SEMARANG</h1>
        <hr class="white" style="margin: 0px 0px 15px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-header">
                            <h1 style="font-size: 40px; margin: 0px;">ANTRIAN</h1>
                            <hr style="margin: 0px;">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-stripped white" id="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">NIM</th>
                                        <th class="text-center">NAMA</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                function reload() {
                    $.getJSON('{{ route('antrian') }}', function (json) {
                        var tr;
                        for (var i = 0; i < json.length; i++) {
                            tr = $('<tr/>');
                            tr.append("<td style='text-align: center;'>" + json[i].nim + "</td>");
                            tr.append("<td>" + json[i].name + "</td>");
                            $('table').append(tr);
                        }
                    });
                }
                reload();
                setInterval(function () {
                    $('tbody tr').empty();
                    reload();
                }, 15000);
            });
        </script>
    </body>
</html>

