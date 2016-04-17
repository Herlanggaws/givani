@extends('layouts.default')
@section('content')
<h3 class="blank1">Ubah Data: {{$user->name}}</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('user/') }}">Kembali</a></li>
</ol>

{!! Form::model($user, ['method'=> 'PATCH', 'action' => ['UserController@update', $user->id],'class'=>'form-horizontal']) !!}
@include('user.form', ['buttonName'=>'Ubah'])
{!! Form::close() !!}





@include('errors.list')

@stop