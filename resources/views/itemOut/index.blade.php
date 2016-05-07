@extends('layouts.default')
@section('content')
<h3 class="blank1">Barang Keluar</h3>

@if (session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif

<?php echo $itemOuts->render(); ?><br/>
<div class="breadcrumb">
	<a href="{{ URL::to('itemout/create') }}">Buat Data</a> | 
	<a href="{{ URL::to('itemout/setReport') }}">Buat Laporan</a>
</div>
<div class="table-responsive">
	@include('includes.search_form',['url'=>'itemout','link'=>'itemout']) 
	<div style="height: 60px;">

	</div>
	<table class="table table-bordered">


		<thead>
			<tr>
				<th>Kode Keluar</th>
				<th>Tanggal</th>
				<th>Deskripsi</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($itemOuts as $itemOut)
			<tr>
				<td>{{ $itemOut->id }}</td>
				<td>{{ $itemOut->date }}</td>
				<td>{{ $itemOut->description }}</td>
				<td>
					<a href="{{url ('itemout', $itemOut->id)}}"class="btn btn-xs btn-link">Lihat</a>
				</td>
			</tr>

			@endforeach




		</tbody>
	</table>
</div>


@stop