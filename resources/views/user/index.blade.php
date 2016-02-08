@extends('layouts.default')
@section('content')
<h3 class="blank1">Pengguna</h3>

<div class="xs tabls">
	<div class="bs-example4" data-example-id="contextual-table">
		<div class="table-responsive">
			<table class="table table-bordered">


				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<th scope="row">1</th>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>
							<a href="{{url ('user', $user->id)}}">Tampil </a>
							| 
							Edit | 
							Hapus
						</td>
					</tr>
					
					@endforeach

					
				</tbody>
			</table>
		</div>
	</div>
</div>


@stop