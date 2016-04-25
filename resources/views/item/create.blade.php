@extends('layouts.default')
@section('content')
<h3 class="blank1">Buat Data Stock Barang</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('item/') }}">Data Stock Barang</a></li>
</ol>

{!! Form::open(['url'=>'item','class'=>'form-horizontal']) !!}
@include('item.form', ['buttonName'=>'Buat'])
{!! Form::close() !!}

@include('errors.list')

@stop


