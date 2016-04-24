@extends('layouts.default')
@section('content')
<h3 class="blank1">Detail Pelanggan</h3>


<ol class="breadcrumb">
	<li><a href="{{ URL::to('customer/') }}">Kembali</a></li>
</ol>

<div class="table-responsive">
	<table class="table" style="width:0% !important">

		<tr>
			<td ><b>Nama</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$customer->name}}</td>
		</tr>


		<tr>
			<td><b>Nama Perusahaan</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$customer->company_name}}</td>
		</tr>

		<tr>
			<td><b>Email</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$customer->email}}</td>
		</tr>

		<tr>
			<td><b>Telp</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$customer->phone}}</td>
		</tr>

		<tr>
			<td><b>Hp</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$customer->mobile}}</td>
		</tr>

		<tr>
			<td><b>Alamat</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$customer->address}}</td>
		</tr>

		<tr>
			<td><b>Kode Pos</b></td>
			<td><b>&nbsp;:&nbsp;</b>{{$customer->pos_code}}</td>
		</tr>

	</table>

</div>
<?php echo $prices->render(); ?><br/>
<div class="table-responsive">

	{!! Form::open(['method'=>'GET','url'=>url ('customer', $customer->id),null,'role'=>'search'])  !!}






	<table style="float: right; !important" width="50%">
		<tr>
			<td width="50%">
				<div class="input-group in-grp1" style="margin: 0 0 0 0; width:90%; !important">							
					<span class="input-group-addon">
						<i class="fa fa-search"></i>
					</span>
					<input id="searchbox" type="text" class="form-control1" name= "search" placeholder="Search..." onkeydown="showHint(this.value)">
				</div>
			</td>
			<td>
				{!! Form::submit('Cari',['class'=>'btn-success btn']) !!}
			</td>
		</tr>
	</table>

	{!! Form::close() !!}
	<div style="height: 60px;">

	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nama Barang</th>
				<th>Harga</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($prices as $price)
			<tr>
				<td>{{ $price->item->name }}</td>
				@if($price->sellable == 1)
				@if($price->is_custom == 1)
				<td>Rp. {{ $price->custom_price }} (Custom)</td>
				@else
				<td>Rp. {{ $price->custom_price }}</td>
				@endif
				
				@else
				<td>Data Harus Dirubah</td>
				@endif
				<td>
					@if(Auth::user()->role == 'admin')
					<a href="{{ URL::to('price/' . $price->id . '/edit') }}"class="btn btn-xs btn-link">Edit </a>	
					@endif
					
				</td>
			</tr>

			@endforeach




		</tbody>
	</table>
</div>



@stop