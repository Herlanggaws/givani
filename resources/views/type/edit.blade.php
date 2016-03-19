@extends('layouts.default')
@section('content')
<h3 class="blank1">Ubah Data: {{$type->name}}</h3>

<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	</div>
</div>



{!! Form::model($type, ['method'=> 'PATCH', 'action' => ['TypeController@update', $type->id],'class'=>'form-horizontal']) !!}
@include('type.form', ['buttonName'=>'Ubah']);
{!! Form::close() !!}





@include('errors.list');

@stop