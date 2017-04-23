@extends('layouts.app')

@section('custom_css')
<link href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- Theme style -->
<link href="{{ URL::asset('assets/dist/css/AdminLTE.min.css')}}" rel="stylesheet">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link href="{{ URL::asset('assets/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet">
  
  @stop




  @section('content')
  @if (session('message'))
  <div class="alert alert-success alert-dismissible">
  	{{ session('message') }}
  </div>
  @endif
  <section class="content">
  	<div class="row">
  		<div class="col-xs-12">
  			<div class="box">
  				<div class="box-header">
  					<h3 class="box-title">Detail Data Konsumen: {{$customer->name}}</h3>
  				</div>
  				<!-- /.box-header -->
  				<div class="box-body">
          <ol class="breadcrumb">
              <li><a href="{{ URL::to('customer/') }}">Kembali</a></li>
            </ol>
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

  					<br/>
  					<table id="example1" class="table table-bordered table-striped">


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

  								@if(!$price->item->trashed())
									<td>{{ $price->item->name }}</td>
									@if($price->sellable == 1)
										@if($price->is_custom == 1)
											<td>Rp. {{ number_format($price->custom_price,2) }} (Custom)</td>
										@else
											<td>Rp. {{ number_format($price->custom_price,2) }}</td>
										@endif
									@else
										<td>Data Harus Dirubah</td>
									@endif
									<td>
									@if(Auth::user()->role == 'admin')
										<a href="{{ URL::to('price/' . $price->id . '/edit') }}"class="btn btn-xs btn-link">Edit </	
									@endif			
									</td>
								@endif
  							</tr>

  							@endforeach




  						</tbody>
  					</table>
  				</div>
  				<!-- /.box-body -->
  				<div class="box-footer">
  					<a href="{{ URL::to('item/create') }}" class="btn btn-primary">Buat Data</a>
  				</div>
  			</div>

  			<!-- /.box -->
  		</div>
  		<!-- /.col -->
  	</div>
  </section>

  @stop


  @section('custom_javascript')

  
  <!-- Bootstrap 3.3.6 -->
  <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
  <!-- SlimScroll -->
  <script src="{{ URL::asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{ URL::asset('assets/plugins/fastclick/fastclick.js')}}"></script>
  <!-- AdminLTE App -->
  
  <!-- AdminLTE for demo purposes -->
  <script src="{{ URL::asset('assets/dist/js/demo.js')}}"></script>
  <!-- page script -->
  <script>
  	$(function () {
  		$("#example1").DataTable();
  		$('#example2').DataTable({
  			"paging": true,
  			"lengthChange": false,
  			"searching": false,
  			"ordering": true,
  			"info": true,
  			"autoWidth": false
  		});
  	});
  </script>
  @stop













