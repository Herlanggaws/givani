@extends('layouts.default')
@section('content')
<h3 class="blank1">Transaksi</h3>

@if (session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif

<?php echo $transactions->render(); ?><br/>
<div class="breadcrumb">
	<a href="{{ URL::to('transaction/setReport') }}">Buat Laporan</a> |
	<a href="{{ URL::to('customer?page=transaction') }}">Buat Transaksi</a>
</div>
<div class="table-responsive">
	@include('includes.search_form',['url'=>'transaction','link'=>'transaction']) 
	

	<div style="height: 60px;">

	</div>
	<table class="table table-bordered">


		<thead>
			<tr>
				<th>Kode Transaksi</th>
				<th>Tanggal</th>
				<th>Atas Nama</th>
				<th>Total</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($transactions as $transaction)
			<tr>

				<td>{{ $transaction->id }}</td>
				<td>{{ $transaction->date }}</td>
				<td>{{$transaction->detailTransaction->first()->price->customer->name}}</td>
				<td>Rp. {{ number_format($transaction->total_price,2) }}</td>
				<td>
					<a href="{{url ('transaction', $transaction->id)}}"class="btn btn-xs btn-link">Lihat Detail</a> | <a href="{{url ('transaction/getBill', $transaction->id)}}"class="btn btn-xs btn-link" target="_blank">Cetak Bukti</a>
				</td>
			</tr>

			@endforeach




		</tbody>
	</table>
</div>


@stop