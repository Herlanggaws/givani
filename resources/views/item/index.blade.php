@extends('layouts.default')
@section('content')
<h3 class="blank1">Barang</h3>

@if (session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif

		<?php echo $items->render(); ?><br/>
		<div class="breadcrumb">
			<a href="{{ URL::to('item/create') }}">Buat Data</a>
		</div>
		<div class="table-responsive">
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
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($items as $item)
					<tr>
						<td>{{ $item->name }}</td>
						<td>{{ $item->production_price }}</td>
						<td>{{ $item->minimum_price }}</td>
						<td>{{ $item->price }}</td>
						<td>{{ $item->stock }}</td>
						<td>{{ $item->minimum_stock }}</td>
						<td>{{ $item->type->name }}</td>

						<td>
							<a href="{{ URL::to('item/' . $item->id . '/edit') }}"class="btn btn-xs btn-link">Edit </a> | 
							{!! Form::model($item, ['method'=> 'DELETE', 'action' => ['ItemsController@destroy', $item->id],'class'=>'btn btn-xs btn-link']) !!}
							{!! Form::submit('Hapus',['class'=>'btn btn-xs btn-link']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
					
					@endforeach

					

					
				</tbody>
			</table>
		</div>


@stop