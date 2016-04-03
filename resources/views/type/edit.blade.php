@extends('layouts.default')
@section('content')
<h3 class="blank1">Ubah Data: {{$type->name}}</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('type/') }}">Kembali</a></li>
</ol>



{!! Form::model($type, ['method'=> 'PATCH', 'action' => ['TypeController@update', $type->id],'class'=>'form-horizontal']) !!}
@include('type.form', ['buttonName'=>'Ubah'])
{!! Form::close() !!}





@include('errors.list')

@stop