{!! Form::open(['method'=>'GET','url'=>$url,null,'class'=>'form-horizontal', 'target'=>'_blank'])  !!}
<div class="form-group">
	{!! Form::label('date', 'Tanggal Awal',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('from', null, ['class'=> 'form-control1', 'id'=>'from', 'placeholder'=>'Tanggal Awal']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('date', 'Tanggal Akhir',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('to', null, ['class'=> 'form-control1', 'id'=>'to', 'placeholder'=>'Tanggal Akhir']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('', '',['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::submit('Buat',['class'=>'btn-success btn']) !!}
	</div>
</div>

{!! Form::close() !!}