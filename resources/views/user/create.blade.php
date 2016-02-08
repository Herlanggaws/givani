@extends('layouts.default')
@section('content')
<h3 class="blank1">Create</h3>

{!! Form::open(['url'=>'user']) !!}

<div>
	{!! Form::label('title', 'Title') !!}
	{!! Form::text('name', null, ['class'=> 'form-control']) !!}
</div>

<div>
	{!! Form::submit('Add',['class'=>'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}

@if (isset($errors) && $errors->any())
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-danger alert-alt">
                <strong><i class="fa fa-bug fa-fw"></i> Ошибка</strong><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <br/>
@endif

@stop