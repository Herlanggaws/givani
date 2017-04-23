@extends('layouts.app')

@section('custom_css')


<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker-bs3.css')}}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/datepicker/datepicker3.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/iCheck/all.css')}}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/timepicker/bootstrap-timepicker.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ URL::asset('assets/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link href="{{ URL::asset('assets/dist/css/skins/_all-skins.min.css')}}">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}">
  @stop
  @section('content')
  





  <section class="content">

  	@include('errors.list')
  	<div class="row">
  		<div class="col-xs-12">
  			<div class="box">
  				<div class="box-header">
  					<h3 class="box-title">Buat Data Stock Barang</h3>
  				</div>
  				<!-- /.box-header -->


  				<ol class="breadcrumb">
  					<li><a href="{{ URL::to('itemin/') }}">Data Barang Masuk</a></li>
  				</ol>
  				<div class="box-body">


  					{!! Form::open(['url'=>'transaction','class'=>'form-horizontal']) !!}
            @include('transaction.form', ['buttonName'=>'Buat'])
            {!! Form::close() !!}


          </div>
          <!-- /.box-body -->
        </div>

        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
  </section>






  @stop


