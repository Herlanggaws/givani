@extends('layouts.default')
@section('content')
<h3 class="blank1">Buat Data Jenis Barang</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('type/') }}">Data Jenis Barang</a></li>
</ol>

{!! Form::open(['url'=>'type','class'=>'form-horizontal']) !!}
@include('type.form', ['buttonName'=>'Buat'])
{!! Form::close() !!}

@include('errors.list')

@stop