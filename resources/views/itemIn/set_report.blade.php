@extends('layouts.default')
@section('content')
<h3 class="blank1">Laporan Barang Masuk</h3>

@if (session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif

<div class="breadcrumb">
	<a href="{{ URL::to('itemin') }}">Barang Masuk</a> 
</div>


@include('includes.report_form',['url'=>'itemin/report','link'=>'itemin/report']) 

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