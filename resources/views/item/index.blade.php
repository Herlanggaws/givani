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
	<a href="{{ URL::to('item/create') }}">Buat Data</a> |
	<a href="{{ URL::to('item/report') }}" target="_blank">Buat Laporan</a>
</div>


<div class="table-responsive">
	@include('includes.search_form',['url'=>'item','link'=>'item']) 
	<div style="height: 60px;">

	</div>

	<table class="table table-bordered">


		<thead>
			<tr>
				<th>Kode Barang</th>
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
				<td>{{$item->id}}</td>
				<td>{{ $item->name }}</td>
				<td>Rp. {{ number_format($item->production_price,2) }}</td>
				<td>Rp. {{ number_format($item->minimum_price,2) }}</td>
				<td>Rp. {{ number_format($item->price,2) }}</td>
				<td>{{ $item->stock }}</td>
				<td>{{ $item->minimum_stock }}</td>
				<td>{{ $item->type->name }}</td>

				<td>
					@if(Auth::user()->role == 'admin')
					<a href="{{ URL::to('item/' . $item->id . '/edit') }}"class="btn btn-xs btn-link" data-confirm="are">Edit </a> | 
					{!! Form::model($item, ['method'=> 'DELETE', 'action' => ['ItemsController@destroy', $item->id],'class'=>'btn btn-xs btn-link', 'onsubmit' => 'return ConfirmDelete()']) !!}
					{!! Form::submit('Hapus',['class'=>'btn btn-xs btn-link']) !!}
					{!! Form::close() !!}
					@endif
				</td>
			</tr>

			@endforeach




		</tbody>
	</table>
</div>

<div style="height: 60px;" id="txtHint">

</div>
@stop

@section('custom_javascript')

<script type="text/javascript">
function ConfirmDelete()
{
	var x = confirm("Apa anda yakin akan menghapus data ini?");
	if (x)
		return true;
	else
		return false;
}
</script>
@stop
