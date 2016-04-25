@extends('layouts.default')
@section('content')
<h3 class="blank1">Ubah Data: {{$customer->name}}</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('customer/') }}">Data Pelanggan</a></li>
</ol>


{!! Form::model($customer, ['method'=> 'PATCH', 'action' => ['CustomerController@update', $customer->id],'class'=>'form-horizontal']) !!}
@include('customer.form', ['buttonName'=>'Ubah'])
{!! Form::close() !!}



@include('errors.list')

@stop