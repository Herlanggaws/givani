<div class="form-group">
	{!! Form::label('name', 'Nama',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('name', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Nama']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('company_name', 'Nama Perusahaan',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('company_name', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Nama Perusahaan']) !!}
	</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Email Address</label>
	<div class="col-md-8">
		{!! Form::text('email', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Email Address']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('phone', 'Telp',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('phone', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Telp']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('mobile', 'HP',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('mobile', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'HP']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('address', 'Alamat',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('address', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Alamat']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('pos_code', 'Kode Pos',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('pos_code', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Kode Pos']) !!}
	</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-md-8">
		{!! Form::submit($buttonName,['class'=>'btn-success btn']) !!}
	</div>
</div>


