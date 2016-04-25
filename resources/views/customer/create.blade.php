@extends('layouts.default')
@section('content')
<h3 class="blank1">Buat Data Pelanggan</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('customer/') }}">Data Pelanggan</a></li>
</ol>

{!! Form::open(['url'=>'customer','class'=>'form-horizontal']) !!}
@include('customer.form', ['buttonName'=>'Buat'])
{!! Form::close() !!}

@include('errors.list')

@stop