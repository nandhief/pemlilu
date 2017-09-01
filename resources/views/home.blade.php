@extends('layouts.app')

@section('meta')
    @if (strtolower(auth()->user()->roles()->first()->title) == 'pengawas' || strtolower(auth()->user()->roles()->first()->title) == 'administrator')
    <meta http-equiv="refresh" content="60">
    @endif
@stop

@section('content')
    <div class="row">
        @if(strtolower(auth()->user()->roles()->first()->title) == 'verifikasi')
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Verifikasi Pemilih</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover {{ $mahasiswa->count() > 0 ? 'datatables' : '' }}">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>NAMA</th>
                                    <th>FAKULTAS</th>
                                    <th>INFO</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(strtolower(auth()->user()->roles()->first()->title) == 'antrian')
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">Antrian Pemilih</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover {{ $onprogres->count() > 0 ? 'datatables' : '' }}">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>NAMA</th>
                                    <th>INFO</th>
                                </tr>
                            </thead>
                            <tbdoy>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($onprogres as $onp)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td class="kode">{{ $onp->nim }}</td>
                                    <td>{{ $onp->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-success" onclick="open{{ $onp->id }}()">Cetak</button>
                                        <script>
                                            function open{{ $onp->id }}() {
                                                var myWindow=window.open();
                                                myWindow.document.close();
                                                myWindow.document.write('<style> @media print {.kode {font-family: Consolas, Roboto Mono, Monaco, Monospace; font-size: 72px; } .table {width:100%; } .solid {border: 1px solid; } .dashed {border: 1px dashed; margin: auto 20px; } td, th {text-align: center; } p, h4 {margin: 0px; } } </style>');
                                                myWindow.document.write('<table class="table"> <tr> <td class="solid"> <h4>{{ ucwords($onp->nim) }}<br><small>{{ $onp->name }}</small></h4> <hr> <p><strong>KODE</strong></p> <p class="kode"><strong>{{ $onp->kode }}</strong></p> </td> <td><span class="dashed"></span></td> <td class="solid">  <h4>{{ ucwords($onp->nim) }}<br><small>{{ $onp->name }}</small></h4> <hr> <p><strong>KODE</strong></p> <p class="kode"><strong>{{ $onp->kode }}</strong></p>  </td> <td><span class="dashed"></span></td> <td class="solid">  <h4>{{ ucwords($onp->nim) }}<br><small>{{ $onp->name }}</small></h4> <hr> <p><strong>KODE</strong></p> <p class="kode"><strong>{{ $onp->kode }}</strong></p> </td> <td><span class="dashed"></span></td> <td class="solid">  <h4>{{ ucwords($onp->nim) }}<br><small>{{ $onp->name }}</small></h4> <hr> <p><strong>KODE</strong></p> <p class="kode"><strong>{{ $onp->kode }}</strong></p> </td> </tr> </table>');
                                                myWindow.focus();
                                                myWindow.print();
                                                myWindow.close();
                                                $.post("{{ route('proses', $onp->id) }}");
                                                location.reload();
                                            }
                                        </script>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Tidak ada data</td>
                                </tr>
                            @endforelse
                            </tbdoy>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(strtolower(auth()->user()->roles()->first()->title) == 'pengawas' || strtolower(auth()->user()->roles()->first()->title) == 'administrator')
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">Antrian Pemilih</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover {{ $onprogres->count() > 0 ? 'datatables' : '' }}">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>NAMA</th>
                                    <th>KODE</th>
                                    <th>INFO</th>
                                </tr>
                            </thead>
                            <tbdoy>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($onprogres as $onp)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $onp->nim }}</td>
                                    <td>{{ $onp->name }}</td>
                                    <td class="kode">{{ $onp->kode }}</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-success" onclick="open{{ $onp->id }}()">Cetak</button>
                                        <script>
                                            function open{{ $onp->id }}() {
                                                var myWindow=window.open();
                                                myWindow.document.close();
                                                myWindow.document.write('<style> @media print {.kode {font-family: Consolas, Roboto Mono, Monaco, Monospace; font-size: 72px; } .table {width:100%; } .solid {border: 1px solid; } .dashed {border: 1px dashed; margin: auto 20px; } td, th {text-align: center; } p, h4 {margin: 0px; } } </style>');
                                                myWindow.document.write('<table class="table"> <tr> <td class="solid"> <h4>{{ ucwords($onp->nim) }}<br><small>{{ $onp->name }}</small></h4> <hr> <p><strong>KODE</strong></p> <p class="kode"><strong>{{ $onp->kode }}</strong></p> </td> <td><span class="dashed"></span></td> <td class="solid">  <h4>{{ ucwords($onp->nim) }}<br><small>{{ $onp->name }}</small></h4> <hr> <p><strong>KODE</strong></p> <p class="kode"><strong>{{ $onp->kode }}</strong></p>  </td> <td><span class="dashed"></span></td> <td class="solid">  <h4>{{ ucwords($onp->nim) }}<br><small>{{ $onp->name }}</small></h4> <hr> <p><strong>KODE</strong></p> <p class="kode"><strong>{{ $onp->kode }}</strong></p> </td> <td><span class="dashed"></span></td> <td class="solid">  <h4>{{ ucwords($onp->nim) }}<br><small>{{ $onp->name }}</small></h4> <hr> <p><strong>KODE</strong></p> <p class="kode"><strong>{{ $onp->kode }}</strong></p> </td> </tr> </table>');
                                                myWindow.focus();
                                                myWindow.print();
                                                myWindow.close();
                                                $.post("{{ route('proses', $onp->id) }}");
                                                location.reload();
                                            }
                                        </script>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Tidak ada data</td>
                                </tr>
                            @endforelse
                            </tbdoy>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">Status Pemilih</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover {{ $kode->count() > 0 ? 'datatables' : '' }}">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>NAMA</th>
                                    <th>KODE</th>
                                    <th>INFO</th>
                                </tr>
                            </thead>
                            <tbdoy>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($kode as $kd)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $kd->nim }}</td>
                                    <td>{{ $kd->name }}</td>
                                    <td class="kode">{{ $kd->kode }}</td>
                                    <td>
                                        <button class="btn btn-xs btn-warning" type="button" onclick="open{{ $kd->id }}()">{{ $kd->status == 0 ? 'Proses' : '' }}</button>
                                        <script>
                                            function open{{ $kd->id }}() {
                                                var myWindow=window.open();
                                                myWindow.document.close();
                                                myWindow.document.write('<style> @media print {.kode {font-family: Consolas, Roboto Mono, Monaco, Monospace; font-size: 72px; } .table {width:100%; } .solid {border: 1px solid; } .dashed {border: 1px dashed; margin: auto 20px; } td, th {text-align: center; } p, h4 {margin: 0px; } } </style>');
                                                myWindow.document.write('<table class="table"> <tr> <td class="solid"> <h4>{{ ucwords($kd->nim) }}<br><small>{{ $kd->name }}</small></h4> <hr> <p><strong>KODE</strong></p> <p class="kode"><strong>{{ $kd->kode }}</strong></p> </td> <td><span class="dashed"></span></td> <td class="solid">  <h4>{{ ucwords($kd->nim) }}<br><small>{{ $kd->name }}</small></h4> <hr> <p><strong>KODE</strong></p> <p class="kode"><strong>{{ $kd->kode }}</strong></p>  </td> <td><span class="dashed"></span></td> <td class="solid">  <h4>{{ ucwords($kd->nim) }}<br><small>{{ $kd->name }}</small></h4> <hr> <p><strong>KODE</strong></p> <p class="kode"><strong>{{ $kd->kode }}</strong></p> </td> <td><span class="dashed"></span></td> <td class="solid">  <h4>{{ ucwords($kd->nim) }}<br><small>{{ $kd->name }}</small></h4> <hr> <p><strong>KODE</strong></p> <p class="kode"><strong>{{ $kd->kode }}</strong></p> </td> </tr> </table>');
                                                myWindow.focus();
                                                myWindow.print();
                                                myWindow.close();
                                            }
                                        </script>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Tidak ada data</td>
                                </tr>
                            @endforelse
                            </tbdoy>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-primary">
                <div class="panel-heading">Sudah Memilih</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover {{ $selesai->count() > 0 ? 'datatables' : '' }}">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>NAMA</th>
                                    <th>FAKULTAS</th>
                                    <th>INFO</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @forelse ($selesai as $finish)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $finish->nim }}</td>
                                    <td>{{ $finish->name }}</td>
                                    <td>{{ $finish->fakultas }}</td>
                                    <td><div class="label label-success">Selesai</div> {{ $finish->updated_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Tidak ada data</td>
                                </tr>
                            @endforelse
                            </tbdoy>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="panel panel-danger">
                <div class="panel-heading">Informasi Mahasiswa USM</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Total Mahasiswa</strong> <span class="badge">{{ $mahasiswa->count() + $onprogres->count() + $kode->count() }}</span></li>
                        <li class="list-group-item"><strong>Total Belum Memilih</strong> <span class="badge">{{ $mahasiswa->count() }}</span></li>
                        <li class="list-group-item"><strong>Total Proses Memilih</strong> <span class="badge">{{ $onprogres->count() + $kode->count() }}</span></li>
                        <li class="list-group-item"><strong>Total Sudah Memilih</strong> <span class="badge">{{ $selesai->count() }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection

@section('style')
    <style>
        @font-face {font-family: KODE; src: url({{ url('assets/fonts/consolab.ttf') }}); } .kode {font-family: KODE, Consolas, Roboto Mono, Monaco, Monospace; } .table {width:100%; } .solid {border: 1px solid; } .dashed {border: 1px dashed; margin: auto 10px; } td, th {text-align: center; }
    </style>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            $(".datatables").dataTable({
                @if(strtolower(auth()->user()->roles()->first()->title) == 'verifikasi')

                ajax: "{!! route('dashboard') !!}",
                "deferRender": true,
                columns: [
                    { data: 'no', name: 'no' },
                    { data: 'nim', name: 'nim' },
                    { data: 'name', name: 'name' },
                    { data: 'fakultas', name: 'fakultas' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
                @endif
            });
        });
    </script>
@stop
