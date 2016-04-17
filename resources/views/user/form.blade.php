<div class="form-group">
	{!! Form::label('name', 'Nama',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('name', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Nama']) !!}
	</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Email</label>
	<div class="col-md-8">
		{!! Form::text('email', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Email Address']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('password', 'Passwrod',['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::password('password', array('class'=> 'form-control1', 'id'=>'txtNewPassword', 'placeholder'=>'Password')) !!}
	</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-sm-8">
		<div class="from-group registrationFormAlert" id="divCheckPasswordMatch">
		</div>
	</div>
</div>

<div class="form-group">
	{!! Form::label('password', 'Konfirmasi Passwrod',['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-8">
		{!! Form::password('password', array('class'=> 'form-control1', 'id'=>'txtConfirmPassword', 'placeholder'=>'Password' , 'onChange'=>'checkPasswordMatch();')) !!}
	</div>
</div>




<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-md-8">
		{!! Form::submit($buttonName,['class'=>'btn-success btn', 'id'=>'mySubmit']) !!}
	</div>
</div>

@section('custom_javascript')
<script type="text/javascript">
$(document).ready(function () {
	$("#txtConfirmPassword").keyup(checkPasswordMatch);
	document.getElementById("mySubmit").disabled = true;
});

function checkPasswordMatch() {
	var password = $("#txtNewPassword").val();
	var confirmPassword = $("#txtConfirmPassword").val();

	if (password != confirmPassword){
		$("#divCheckPasswordMatch").html("Passwords do not match!");
		document.getElementById("mySubmit").disabled = true;
	}else{
		$("#divCheckPasswordMatch").html("Passwords match.");
		document.getElementById("mySubmit").disabled = false;
	}
}
</script>
@stop
