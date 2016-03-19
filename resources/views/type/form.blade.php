<div class="form-group">
	{!! Form::label('name', 'Nama Jenis Barang',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('name', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Nama Jenis Barang']) !!}
	</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-md-8">
		{!! Form::submit($buttonName,['class'=>'btn-success btn']) !!}
	</div>
</div>
