@extends('layouts.report_default')
@section('content')
<h3 class="blank1">Laporan Pelanggan</h3>

<div class="table-responsive">
	<div style="height: 20px;">

	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Nama Perusahaan</th>
				<th>Alamat</th>
				<th>Email</th>
				<th>Telp</th>
				<th>Hp</th>
				<th>Alamat</th>
				<th>Kode Pos</th>
			</tr>
		</thead>
		<tbody>
			@foreach($customers as $customer)
			<tr>
				<td>{{ $customer->name }}</td>
				<td>{{ $customer->company_name }}</td>
				<td>{{ $customer->address }}</td>
				<td>{{ $customer->email }}</td>
				<td>{{$customer->phone}}</td>
				<td>{{$customer->mobile}}</td>
				<td>{{$customer->address}}</td>
				<td>{{$customer->pos_code}}</td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>
@stop