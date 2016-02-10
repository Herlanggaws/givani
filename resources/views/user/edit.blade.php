@extends('layouts.default')
@section('content')
<h3 class="blank1">Create</h3>

<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	</div>
</div>



{!! Form::model($user, ['method'=> 'PATCH', 'action' => ['UserController@update', $user->id],'class'=>'form-horizontal']) !!}
@include('user.form', ['buttonName'=>'Ubah']);
{!! Form::close() !!}





@include('errors.list');

@stop