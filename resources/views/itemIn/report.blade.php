@extends('layouts.report_default')
@section('content')
<h3 class="blank1">Laporan Barang Masuk</h3>
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
				<th>Kode Masuk</th>
				<th>Tanggal</th>
				<th>Deskripsi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($itemIns as $itemIn)
			<tr>
				<td>{{ $itemIn->id }}</td>
				<td>{{ $itemIn->date }}</td>
				<td>{{ $itemIn->description }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop