@extends('layouts.default')
@section('content')
<h3 class="blank1">Create</h3>

<div class="tab-content">
    <div class="tab-pane active" id="horizontal-form">
    </div>
</div>

{!! Form::open(['url'=>'user','class'=>'form-horizontal']) !!}
@include('user.form', ['buttonName'=>'Buat']);
{!! Form::close() !!}

@include('errors.list');

@stop