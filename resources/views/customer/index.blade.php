@extends('layouts.default')
@section('content')
<h3 class="blank1">Pelanggan</h3>

@if (session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif

<?php echo $customers->render(); ?><br/>
<div class="breadcrumb">
	<a href="{{ URL::to('customer/create') }}">Buat Data</a>
</div>
<div class="table-responsive">
	@include('includes.search_form',['url'=>'customer','link'=>'customer']) 
	

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
					<a href="{{url ('customer', $customer->id)}}"class="btn btn-xs btn-link">Lihat	 </a>
					| <a href="{{ URL::to('customer/' . $customer->id . '/edit') }}"class="btn btn-xs btn-link">Edit </a> | 
					{!! Form::model($customer, ['method'=> 'DELETE', 'action' => ['CustomerController@destroy', $customer->id],'class'=>'btn btn-xs btn-link']) !!}
					{!! Form::submit('Hapus',['class'=>'btn btn-xs btn-link']) !!}
					{!! Form::close() !!}
				</td>
			</tr>

			@endforeach




		</tbody>
	</table>
</div>


@stop