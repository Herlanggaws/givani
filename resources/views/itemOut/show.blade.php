@extends('layouts.default')
@section('content')
<h3 class="blank1">Detail Pelanggan</h3>


<ol class="breadcrumb">
	<li><a href="{{ URL::to('itemout/') }}">Kembali</a></li>
</ol>

<div class="table-responsive">
	<table class="table" style="width:0% !important">

		<tr>
			<td ><b>Kode Masuk</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$itemOut->id}}</td>
		</tr>


		<tr>
			<td><b>Tanggal Masuk</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$itemOut->date}}</td>
		</tr>

		<tr>
			<td><b>Keterangan</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$itemOut->description}}</td>
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
					@foreach($DetailItemOuts as $DetailItemOut)
					<tr>
						<td>{{ $DetailItemOut->item_id }}</td>
						<td>{{ $DetailItemOut->item->name }}</td>
						<td>{{ $DetailItemOut->qty }}</td>
					</tr>
					
					@endforeach
				</tbody>

			</tbody>
		</table>
	</div>

</div>
@stop