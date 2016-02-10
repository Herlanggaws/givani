@extends('layouts.default')
@section('content')
<h3 class="blank1">Pengguna</h3>

@if (session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif
<div class="xs tabls">
	<div class="bs-example4" data-example-id="contextual-table">
		<div class="table-responsive">
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
							<!-- <a href="{{url ('user', $user->id)}}"class="btn btn_5 btn-lg btn-link">Tampil </a>
							|  -->
							<a href="{{ URL::to('user/' . $user->id . '/edit') }}"class="btn btn-xs btn-link">Edit </a> | 
							{!! Form::model($user, ['method'=> 'DELETE', 'action' => ['UserController@destroy', $user->id],'class'=>'btn btn-xs btn-link']) !!}
							{!! Form::submit('Hapus',['class'=>'btn btn-xs btn-link']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
					
					@endforeach

					<?php echo $users->render(); ?>

					
				</tbody>
			</table>
		</div>
	</div>
</div>


@stop