@extends('layouts.default')
@section('content')
<h3 class="blank1">Pengguna</h3>

@if (session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif

<?php echo $users->render(); ?><br/>
<div class="breadcrumb">
	<a href="{{ URL::to('user/create') }}">Buat Data</a>
</div>
<div class="table-responsive">

	@include('includes.search_form',['url'=>'user','link'=>'user']) 
	

	<div style="height: 60px;">

	</div>
	<table class="table table-bordered">
		<thead>
			<tr>

				<th>Name</th>
				<th>Email</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>

				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					@if(Auth::user()->role == 'admin')
					<a href="{{ URL::to('user/' . $user->id . '/edit') }}"class="btn btn-xs btn-link">Edit </a> | 
					{!! Form::model($user, ['method'=> 'DELETE', 'action' => ['UserController@destroy', $user->id],'class'=>'btn btn-xs btn-link', 'onsubmit' => 'return ConfirmDelete()']) !!}
					{!! Form::submit('Hapus',['class'=>'btn btn-xs btn-link']) !!}
					{!! Form::close() !!}
					@endif
				</td>
			</tr>

			@endforeach




		</tbody>
	</table>
</div>


@stop


@section('custom_javascript')

<script type="text/javascript">
function ConfirmDelete()
{
	var x = confirm("Apa anda yakin akan menghapus data ini?");
	if (x)
		return true;
	else
		return false;
}
</script>
@stop