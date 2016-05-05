@extends('layouts.default')
@section('content')
<h3 class="blank1">Transaksi</h3>

@if (session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif

<?php echo $customers->render(); ?><br/>
<div class="breadcrumb">
</div>
<div class="table-responsive">
	@include('includes.search_form',['url'=>'transaction','link'=>'transaction']) 
	

	<div style="height: 60px;">

	</div>
	<table class="table table-bordered">


		<thead>
			<tr>
				<th>Nama</th>
				<th>Nama Perusahaan</th>
				<th>Alamat</th>
				<th>Email</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($customers as $customer)
			<tr>

				<td>{{ $customer->name }}</td>
				<td>{{ $customer->company_name }}</td>
				<td>{{ $customer->address }}</td>
				<td>{{ $customer->email }}</td>
				<td>
					<a href="{{ URL::to('transaction/create?id='.$customer->id) }}">Pilih</a>
				</td>
			</tr>

			@endforeach




		</tbody>
	</table>
</div>


@stop