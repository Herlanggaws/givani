@extends('layouts.default')
@section('content')
<h3 class="blank1">Pengguna</h3>

@if (session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif

		<?php echo $itemIns->render(); ?><br/>
		<div class="breadcrumb">
			<a href="{{ URL::to('itemin/create') }}">Buat Data</a>
		</div>
		<div class="table-responsive">
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
							
						</td>
					</tr>
					
					@endforeach

					

					
				</tbody>
			</table>
		</div>


@stop