@extends('layouts.default')
@section('content')
<h3 class="blank1">Jenis Barang</h3>

@if (session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif

<?php echo $types->render(); ?><br/>
<div class="breadcrumb">
	<a href="{{ URL::to('type/create') }}">Buat Data</a>
</div>
<div class="table-responsive">
	@include('includes.search_form',['url'=>'type','link'=>'type']) 
	<div style="height: 60px;">

	</div>
	<table class="table table-bordered">
		<thead>
			<tr>

				<th>Name</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($types as $type)
			<tr>

				<td>{{ $type->name }}</td>
				<td>
					<a href="{{ URL::to('type/' . $type->id . '/edit') }}"class="btn btn-xs btn-link">Edit </a> | 
					{!! Form::model($type, ['method'=> 'DELETE', 'action' => ['TypeController@destroy', $type->id],'class'=>'btn btn-xs btn-link']) !!}
					{!! Form::submit('Hapus',['class'=>'btn btn-xs btn-link']) !!}
					{!! Form::close() !!}
				</td>
			</tr>

			@endforeach


		</tbody>
	</table>
</div>



@stop