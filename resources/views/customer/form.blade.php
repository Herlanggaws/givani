<div class="form-group">
	{!! Form::label('name', 'Nama',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('name', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Nama']) !!}
	</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-md-8">
		{!! Form::submit($buttonName,['class'=>'btn-success btn']) !!}
	</div>
</div>
