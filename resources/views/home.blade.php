@extends('layouts.app')

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
                            <tbdoy>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($mahasiswa as $mhs)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $mhs->nim }}</td>
                                    <td>{{ $mhs->name }}</td>
                                    <td>{{ $mhs->fakultas }}</td>
                                    <td>
                                        {{ Form::open(['route' => ['antri', $mhs->id], 'method' => 'POST']) }}
                                            {{ Form::submit('Antri', ['class' => 'btn btn-xs btn-info']) }}
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
                                    <td>{{ $onp->kode }}</td>
                                    <td>
                                        {{ Form::open(['route' => ['proses', $onp->id], 'method' => 'POST']) }}
                                            {{ Form::submit('Memilih', ['class' => 'btn btn-xs btn-success']) }}
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
        @endif
        @if(strtolower(auth()->user()->roles()->first()->title) == 'pengawas' || strtolower(auth()->user()->roles()->first()->title) == 'administrator')
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
                            <tbdoy>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($mahasiswa as $mhs)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $mhs->nim }}</td>
                                    <td>{{ $mhs->name }}</td>
                                    <td>{{ $mhs->fakultas }}</td>
                                    <td>
                                        {{ Form::open(['route' => ['antri', $mhs->id], 'method' => 'POST']) }}
                                            {{ Form::submit('Antri', ['class' => 'btn btn-xs btn-info']) }}
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
                                    <td>{{ $onp->kode }}</td>
                                    <td>
                                        {{ Form::open(['route' => ['proses', $onp->id], 'method' => 'POST']) }}
                                            {{ Form::submit('Memilih', ['class' => 'btn btn-xs btn-success']) }}
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
        <div class="col-md-12">
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
                                    <td>{{ $kd->kode }}</td>
                                    <td>
                                        <button class="btn btn-xs btn-warning">{{ $kd->status == 0 ? 'Proses' : '' }}</button>
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
        <div class="col-md-12">
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
        @endif
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $(".datatables").dataTable();
        });
    </script>
@stop
