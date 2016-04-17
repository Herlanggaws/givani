<div class="form-group">
	{!! Form::label('price', 'Harga Minimum',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::number('price', $price->item->minimum_price, ['class'=> 'form-control1', 'placeholder'=>'Harga', 'id'=>'price', 'disabled' => 'disabled']) !!}
	</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-sm-8">
		<div class="from-group registrationFormAlert" id="divCheckPrice">
		</div>
	</div>
</div>

<div class="form-group">
	{!! Form::label('custom_price', 'Harga',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::number('custom_price', null, ['class'=> 'form-control1', 'placeholder'=>'Harga', 'id'=>'custom_price']) !!}
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
	$("#custom_price").keyup(checkPrice);
});

function checkPrice(){
	var price =parseInt($("#price").val());
	var customPrice =parseInt($("#custom_price").val());
	

	// alert("checkPrice");
	

	if (price > customPrice || isNaN(customPrice)){
		$("#divCheckPrice").html("Harga Terlalu Rendah");
	}else {
		$("#divCheckPrice").html("Harga Cocok");
	}
}


</script>
@stop