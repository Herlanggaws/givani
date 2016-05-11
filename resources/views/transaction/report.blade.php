@extends('layouts.report_default')
@section('content')
<h3 class="blank1">Laporan Transaksi</h3>
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
				<th>Kode Transaksi</th>
				<th>Tanggal</th>
				<th>Atas Nama</th>
				<th>Total</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($transactions as $transaction)
			<tr>

				<td>{{ $transaction->id }}</td>
				<td>{{ $transaction->date }}</td>
				<td>{{$transaction->detailTransaction->first()->price->customer->name}}</td>
				<td>Rp. {{ number_format($transaction->total_price,2) }}</td>
				
			</tr>

			@endforeach

			<tr>
				<td colspan='3'>Total</td>
				<td>Rp. {{number_format($transaction->sum('total_price'),2)}}</td>
			</tr>
		</tbody>
	</table>
</div>
@stop