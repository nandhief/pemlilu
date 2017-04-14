@extends('layouts.app')

@section('content')
	<h3 class="page-title">Quick Count Pemilu Raya Universitas Semarang</h3>
	<div class="panel panel-info">
		<div class="panel-heading">Jumlah Perhitungan Pemilu Raya Universitas Semarang</div>
		<div class="panel-body">
			<div class="row">
				@foreach ($memilih as $data)
				<div class="col-md-4 col-sm-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Calon no {{ $data->id }}</div>
						<div class="panel-body">{{ $data->mahasiswas_count }}</div>
					</div>
				</div>
				@endforeach
				<div class="col-md-4 col-sm-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Golput</div>
						<div class="panel-body">{{ $golput }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop