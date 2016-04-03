<div class="form-group">
	{!! Form::label('name', 'Nama Barang',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('name', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Nama Barang']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('production_price', 'Harga Produksi',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::number('production_price', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Harga Produksi']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('price', 'Harga',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::number('price', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Harga']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('minimum_price', 'Harga Minimum',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::number('minimum_price', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Harga Minimum']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('minimum_stock', 'Stock Minimum',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::number('minimum_stock', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Stock Minimum']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('type_id', 'Jenis Barang',['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-8">
		{!!  Form::select('type_id', $typeList,null, array('class'=>'form-control1', 'id'=>'selector1'))!!}
	</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-md-8">
		{!! Form::submit($buttonName,['class'=>'btn-success btn']) !!}
	</div>
</div>




