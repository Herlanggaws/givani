@extends('layouts.default')
@section('content')
<h3 class="blank1">Laporan Barang Keluar</h3>

@if (session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif

<div class="breadcrumb">
	<a href="{{ URL::to('itemout') }}">Barang Keluar</a> 
</div>


@include('includes.report_form',['url'=>'itemout/report','link'=>'itemout/report']) 

@stop


@section('custom_javascript')

<script>
$(function() {
	$( "#from" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#to" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#to" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 3,
		onClose: function( selectedDate ) {
			$( "#from" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
});
</script>
@stop