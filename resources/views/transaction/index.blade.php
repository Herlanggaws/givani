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
</div>
<div class="table-responsive">
	@include('includes.search_form',['url'=>'transaction','link'=>'transaction']) 
	

	<div style="height: 60px;">

	</div>
	<table class="table table-bordered">


		<thead>
			<tr>
				<th>Kode Transaksi</th>
				<th>Total</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($transactions as $transaction)
			<tr>

				<td>{{ $transaction->id }}</td>
				<td>Rp. {{ number_format($transaction->total_price,2) }}</td>
				<td>
					<a href="{{url ('transaction', $transaction->id)}}"class="btn btn-xs btn-link">Lihat Detail</a>
				</td>
			</tr>

			@endforeach




		</tbody>
	</table>
</div>


@stop