@extends('layouts.default')
@section('content')
<h3 class="blank1">Detail Barang Masuk</h3>


<ol class="breadcrumb">
	<li><a href="{{ URL::to('itemin/') }}">Kembali</a></li>
</ol>

<div class="table-responsive">
	<table class="table" style="width:0% !important">

		<tr>
			<td ><b>Kode Masuk</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$itemIn->id}}</td>
		</tr>


		<tr>
			<td><b>Tanggal Masuk</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$itemIn->date}}</td>
		</tr>

		<tr>
			<td><b>Keterangan</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$itemIn->description}}</td>
		</tr>
	</table>


	<div class="table-responsive">
		<table class="table table-bordered">


			<thead>
				<tr>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<tbody>
					@foreach($DetailItemIns as $DetailItemIn)
					<tr>
						<td>{{ $DetailItemIn->item_id }}</td>
						<td>{{ $DetailItemIn->item->name }}</td>
						<td>{{ $DetailItemIn->qty }}</td>
					</tr>
					
					@endforeach
				</tbody>

			</tbody>
		</table>
	</div>

</div>
@stop