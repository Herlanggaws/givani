@extends('layouts.default')
@section('content')
<h3 class="blank1">Buat Data Barang Masuk</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('itemin/') }}">Kembali</a></li>
</ol>

{!! Form::open(['url'=>'transaction','class'=>'form-horizontal']) !!}
@include('transaction.form', ['buttonName'=>'Buat'])
{!! Form::close() !!}

@include('errors.list')

@stop