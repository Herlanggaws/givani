@extends('layouts.default')
@section('content')
<h3 class="blank1">Buat Data Jenis Barang</h3>

<div class="tab-content">
    <div class="tab-pane active" id="horizontal-form">
    </div>
</div>

{!! Form::open(['url'=>'type','class'=>'form-horizontal']) !!}
@include('type.form', ['buttonName'=>'Buat']);
{!! Form::close() !!}

@include('errors.list');

@stop