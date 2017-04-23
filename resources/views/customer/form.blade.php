<div class="box-body">

	<div class="form-group">
		{!! Form::label('name', 'Nama') !!}

		
		{!! Form::text('name', null, ['class'=> 'form-control', 'id'=>'focusedinput', 'placeholder'=>'Nama']) !!}
		
	</div>

	<div class="form-group">
		{!! Form::label('company_name', 'Nama Perusahaan') !!}

		
		{!! Form::text('company_name', null, ['class'=> 'form-control', 'id'=>'focusedinput', 'placeholder'=>'Nama Perusahaan']) !!}
		
	</div>

	<div class="form-group">
		<label >Email Address</label>
		
		{!! Form::text('email', null, ['class'=> 'form-control', 'id'=>'focusedinput', 'placeholder'=>'Email Address']) !!}
		
	</div>

	<div class="form-group">
		{!! Form::label('phone', 'Telp') !!}

		
		{!! Form::text('phone', null, ['class'=> 'form-control', 'id'=>'focusedinput', 'placeholder'=>'Telp']) !!}
		
	</div>

	<div class="form-group">
		{!! Form::label('mobile', 'HP') !!}

		
		{!! Form::text('mobile', null, ['class'=> 'form-control', 'id'=>'focusedinput', 'placeholder'=>'HP']) !!}
		
	</div>

	<div class="form-group">
		{!! Form::label('address', 'Alamat') !!}

		
		{!! Form::text('address', null, ['class'=> 'form-control', 'id'=>'focusedinput', 'placeholder'=>'Alamat']) !!}
		
	</div>

	<div class="form-group">
		{!! Form::label('pos_code', 'Kode Pos') !!}

		
		{!! Form::text('pos_code', null, ['class'=> 'form-control', 'id'=>'focusedinput', 'placeholder'=>'Kode Pos']) !!}
		
	</div>

	<div class="form-group">
		
		{!! Form::submit($buttonName,['class'=>'btn-success btn']) !!}
		
	</div>

</div>
