@extends('layouts.default')
@section('content')
<h3 class="blank1">Ubah Data: {{$item->name}}</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('item/') }}">Kembali</a></li>
</ol>

{!! Form::model($item, ['method'=> 'PATCH', 'action' => ['ItemsController@update', $item->id],'class'=>'form-horizontal']) !!}
@include('item.form', ['buttonName'=>'Ubah'])
{!! Form::close() !!}





@include('errors.list')

@stop