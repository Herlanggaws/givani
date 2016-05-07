@extends('layouts.report_default')
@section('content')
<h3 class="blank1">Laporan Barang Keluar</h3>
<table>
	<tr>
		<td>Tanggal Awal</td>
		<td>&nbsp;:&nbsp;</td>
		<td>{{$from}}</td>
	</tr>
	<tr>
		<td>Tanggal Akhir</td>
		<td>&nbsp;:&nbsp;</td>
		<td>{{$to}}</td>
	</tr>
</table>
<div class="table-responsive">
	<div style="height: 20px;">

	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Kode Keluar</th>
				<th>Tanggal</th>
				<th>Deskripsi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($itemOuts as $itemout)
			<tr>
				<td>{{ $itemout->id }}</td>
				<td>{{ $itemout->date }}</td>
				<td>{{ $itemout->description }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop