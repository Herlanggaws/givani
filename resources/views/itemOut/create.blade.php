@extends('layouts.default')
@section('content')
<h3 class="blank1">Buat Data Barang Keluar</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('itemout/') }}">Data Barang Keluar</a></li>
</ol>

{!! Form::open(['url'=>'itemout','class'=>'form-horizontal']) !!}
@include('itemout.form', ['buttonName'=>'Buat'])
{!! Form::close() !!}

@include('errors.list')

@stop