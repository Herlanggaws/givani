@extends('layouts.default')
@section('content')
<h3 class="blank1">Detail Pelanggan</h3>


<ol class="breadcrumb">
	<li><a href="{{ URL::to('transaction/') }}">Data Transaksi</a></li>
</ol>

<div class="table-responsive">
	<table class="table" style="width:0% !important">

		<tr>
			<td ><b>Kode Transaksi</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$transaction->id}}</td>
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
				<td>{{ $detailTransaction->price->item->name }}</td>
				<td>Rp. {{ $detailTransaction->price->custom_price }}</td>
				<td>{{ $detailTransaction->qty }}</td>
				<td>Rp. {{ $detailTransaction->subtotal }}</td>
			</tr>

			@endforeach




		</tbody>
	</table>
</div>



@stop