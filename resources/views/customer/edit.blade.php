@extends('layouts.default')
@section('content')
<h3 class="blank1">Buat Data Pelanggan</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('customer/') }}">Kembali</a></li>
</ol>


{!! Form::model($customer, ['method'=> 'PATCH', 'action' => ['CustomerController@update', $customer->id],'class'=>'form-horizontal']) !!}
@include('customer.form', ['buttonName'=>'Ubah'])
{!! Form::close() !!}



@include('errors.list')

@stop