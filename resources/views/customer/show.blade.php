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





@stop