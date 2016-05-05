@extends('layouts.default')
@section('content')
<h3 class="blank1">Barang Masuk</h3>

@if (session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif

<?php echo $itemIns->render(); ?><br/>
<div class="breadcrumb">
	<a href="{{ URL::to('itemin/create') }}">Buat Data</a> | 
	<a href="{{ URL::to('itemin/setReport') }}">Buat Laporan</a>
</div>
<div class="table-responsive">
	@include('includes.search_form',['url'=>'itemin','link'=>'itemin']) 
	<div style="height: 60px;">

	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Kode Masuk</th>
				<th>Tanggal</th>
				<th>Deskripsi</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($itemIns as $itemIn)
			<tr>
				<td>{{ $itemIn->id }}</td>
				<td>{{ $itemIn->date }}</td>
				<td>{{ $itemIn->description }}</td>
				<td>
					<a href="{{url ('itemin', $itemIn->id)}}"class="btn btn-xs btn-link">Lihat</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop