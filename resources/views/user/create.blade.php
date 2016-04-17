@extends('layouts.default')
@section('content')
<h3 class="blank1">Buat Data Pengguna</h3>

<ol class="breadcrumb">
	<li><a href="{{ URL::to('user/') }}">Kembali</a></li>
</ol>

{!! Form::open(['url'=>'user','class'=>'form-horizontal']) !!}
@include('user.form', ['buttonName'=>'Buat'])
{!! Form::close() !!}

@include('errors.list')

@stop