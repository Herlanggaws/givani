@extends('layouts.default')
@section('content')
<h3 class="blank1">Detail Pelanggan</h3>


<ol class="breadcrumb">
	<li><a href="{{ URL::to('transaction/') }}">Data Transaksi</a></li>
	<li><a href="{{url ('transaction/getBill', $transaction->id)}}"class="btn btn-xs btn-link" target="_blank">Cetak Bukti</a></li>
</ol>

<div class="table-responsive">
	<table class="table" style="width:0% !important">

		<tr>
			<td ><b>Kode Transaksi</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$transaction->id}}</td>
		</tr>

		<tr>
			<td ><b>Atas Nama</b></td>
			<td>{{$transaction->detailTransaction->first()->price->customer->name}}</td>
		</tr>


		<tr>
			<td><b>Tanggal Transaksi</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$transaction->date}}</td>
		</tr>

	</table>

</div>
<div class="table-responsive">
	<div style="height: 60px;">

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
				<td>{{ $detailTransaction->price->item->name }} | {{$detailTransaction->price->customer->name}}</td>
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