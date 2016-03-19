@extends('layouts.default')
@section('content')
<h3 class="blank1">Buat Data Pelanggan</h3>

<div class="tab-content">
    <div class="tab-pane active" id="horizontal-form">
    </div>
</div>

{!! Form::open(['url'=>'customer','class'=>'form-horizontal']) !!}
@include('customer.form', ['buttonName'=>'Buat']);
{!! Form::close() !!}

@include('errors.list');

@stop