@extends('layouts.report_default')
@section('content')
<h3 class="blank1">Bukti Transaksi</h3>


<table>

	<tr>
		<td>Kode Transaksi</td>
		<td>&nbsp;:&nbsp;</td>
		<td>{{$transaction->id}}</td>
	</tr>
	<tr>
		<td>Atas Nama</td>
		<td>&nbsp;:&nbsp;</td>
		<td>{{$transaction->detailTransaction->first()->price->customer->name}}</td>
	</tr>
	<tr>
		<td>Tanggal Transaksi</td>
		<td>&nbsp;:&nbsp;</td>
		<td>{{$transaction->date}}</td>
	</tr>
</table>
<div class="table-responsive">
	<div style="height: 20px;">

	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nama Barang</th>
				<th>Harga</th>
				<th>Qty</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
			@foreach($transaction->detailTransaction as $detailTransaction)
			<tr>
				<td>{{ $detailTransaction->price->item->name }}</td>
				<td>Rp. {{ number_format($detailTransaction->price->custom_price,2) }}</td>
				<td>{{ $detailTransaction->qty }}</td>
				<td>Rp. {{ number_format($detailTransaction->subtotal,2) }}</td>
			</tr>
			@endforeach

			<tr>
				<td colspan='3'>Total</td>
				<td>Rp. {{number_format($transaction->total_price,2)}} </td>
			</tr>
		</tbody>
	</table>
</div>
@stop