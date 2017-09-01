<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
	<title>Datatables</title>
	<link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('datatables/css/jquery.dataTables.min.css') }}">
	<style>
		body {
			padding-top: 40px;
		}
	</style>
</head>
<body>
	<div class="container">
		<table class="table table-bordered" id="users-table">
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

	<script src="{{ url('assets/js/jquery-2.2.3.min.js') }}"></script>
	<script src="{{ url('datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
	<script>
	$(function() {
	    $('#users-table').DataTable({
	        ajax: '{!! route('mhs.index') !!}',
	        "deferRender": true,
	        columns: [
	            { data: 'no', name: 'no' },
	            { data: 'nim', name: 'nim' },
	            { data: 'name', name: 'name' },
	            { data: 'fakultas', name: 'fakultas' },
	            { data: 'action', name: 'action', orderable: false, searchable: false }
	        ]
	    });
	});
	</script>
</body>
</html>