@extends('layouts.app')

@section('content')
    <h3 class="page-title">Dashboard</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Pemilih</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover {{ $mahasiswa->count() > 0 ? 'datatables' : '' }}">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>NAMA</th>
                                    <th>FAKULTAS</th>
                                    <th>INFO</th>
                                </tr>
                            </thead>
                            <tbdoy>
                                @forelse ($mahasiswa as $mhs)
                                <tr>
                                    <td>{{ $mhs->nim }}</td>
                                    <td>{{ $mhs->name }}</td>
                                    <td>{{ $mhs->fakultas }}</td>
                                    <td>
                                        {{ Form::open(['route' => ['antri', $mhs->id], 'method' => 'POST']) }}
                                            {{ Form::hidden('kode', strtolower(str_random(2))) }}
                                            {{ Form::hidden('status', '0') }}
                                            {{ Form::submit((is_null($mhs->status) ? 'Antri' : ''), ['class' => 'btn btn-xs btn-info']) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbdoy>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="panel panel-info">
                <div class="panel-heading">Proses memilih</div>
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
                            @forelse ($onprogres as $on)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $on->nim }}</td>
                                    <td>{{ $on->name }}</td>
                                    <td>{{ $on->kode }}</td>
                                    <td>
                                        {{ Form::open(['route' => ['proses', $on->id], 'method' => 'POST']) }}
                                            {{ Form::hidden('status', '1') }}
                                            {{ Form::submit(($on->status == 0 ? 'Proses' : ''), ['class' => 'btn btn-xs btn-warning']) }}
                                        {{ Form::close() }}
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
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="panel panel-success">
                <div class="panel-heading">Sudah memilih</div>
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
                            <tbdoy>
                            @php
                                $no1 = 1;
                            @endphp
                            @forelse ($selesai as $done)
                                <tr>
                                    <td>{{ $no1++ }}</td>
                                    <td>{{ $done->nim }}</td>
                                    <td>{{ $done->name }}</td>
                                    <td>{{ $done->fakultas }}</td>
                                    <td>
                                        <button class="btn btn-xs btn-success">{{ $done->status == 1 ? 'Memilih' : '' }}</button>
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
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $(".datatables").dataTable();
        });
    </script>
@stop
