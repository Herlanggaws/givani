<div class="box-body">

	<div class="form-group">
		{!! Form::label('name', 'Nama Jenis Barang') !!}

		
		{!! Form::text('name', null, ['class'=> 'form-control', 'id'=>'focusedinput', 'placeholder'=>'Nama Jenis Barang']) !!}
		
	</div>

	<div class="form-group">
		
		{!! Form::submit($buttonName,['class'=>'btn-success btn']) !!}
		
	</div>
</div>


