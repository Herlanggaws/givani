@extends('layouts.report_default')
@section('content')
<h3 class="blank1">Laporan Pelanggan</h3>

<div class="table-responsive">
	<div style="height: 20px;">

	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nama Barang</th>
				<th>Harga Produksi</th>
				<th>Harga Minimum</th>
				<th>Harga Jual</th>
				<th>Stock</th>
				<th>Minimum Stock</th>
				<th>Jenis Barang</th>
			</tr>
		</thead>
		<tbody>
			@foreach($items as $item)
			<tr>
				<td>{{ $item->name }}</td>
				<td>Rp. {{ number_format($item->production_price,2) }}</td>
				<td>Rp. {{ number_format($item->minimum_price,2) }}</td>
				<td>Rp. {{ number_format($item->price,2) }}</td>
				<td>{{ $item->stock }}</td>
				<td>{{ $item->minimum_stock }}</td>
				<td>{{ $item->type->name }}</td>

			</tr>

			@endforeach
		</tbody>
	</table>
</div>
@stop