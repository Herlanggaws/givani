@extends('layouts.default')
@section('content')
<h3 class="blank1">Buat Data Barang Masuk</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('itemin/') }}">Data Barang Masuk</a></li>
</ol>

{!! Form::open(['url'=>'itemin','class'=>'form-horizontal']) !!}
@include('itemin.form', ['buttonName'=>'Buat'])
{!! Form::close() !!}

@include('errors.list')

@stop