@extends('layouts.default')
@section('content')
<h3 class="blank1">Buat Data Stock Barang</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('itemin/') }}">Kembali</a></li>
</ol>

{!! Form::open(['url'=>'itemin','class'=>'form-horizontal']) !!}
@include('itemin.form', ['buttonName'=>'Buat'])
{!! Form::close() !!}

@include('errors.list')

@stop