@extends('layouts.default')
@section('content')
<h3 class="blank1">Ubah Harga: {{$price->item->name}}</h3>

<ol class="breadcrumb">
	<!-- <li><a href="{{ URL::to('item/') }}">Kembali</a></li> -->
</ol>

{!! Form::model($price, ['method'=> 'PATCH', 'action' => ['PriceController@update', $price->id],'class'=>'form-horizontal']) !!}
@include('price.form', ['buttonName'=>'Ubah'])
{!! Form::close() !!}





@include('errors.list')

@stop