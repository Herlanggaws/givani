<div class="box-body">
	<div class="form-group">
		{!! Form::label('price', 'Harga Minimum') !!}

		{!! Form::number('price', $price->item->minimum_price, ['class'=> 'form-control', 'placeholder'=>'Harga', 'id'=>'price', 'disabled' => 'disabled']) !!}

	</div>

	<div class="form-group">

		
		<div class="from-group registrationFormAlert" id="divCheckPrice">
		</div>
		
	</div>


	<div class="form-group">
		{!! Form::label('custom_price', 'Harga') !!}


		{!! Form::number('custom_price', null, ['class'=> 'form-control', 'placeholder'=>'Harga', 'id'=>'custom_price']) !!}

	</div>


	<div class="form-group">

		{!! Form::submit($buttonName,['class'=>'btn-success btn', 'id'=>'mySubmit']) !!}

	</div>
</div>









@section('custom_javascript')
<script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>

<script type="text/javascript">
	$(document).ready(function () {
		$("#custom_price").keyup(checkPrice);
		checkPrice();
	});
	function checkPrice(){
		var price =parseInt($("#price").val());
		var customPrice =parseInt($("#custom_price").val());

	// alert("checkPrice");
	
	if (price > customPrice || isNaN(customPrice)){
		document.getElementById("mySubmit").disabled = true;
		$("#divCheckPrice").html("Harga Terlalu Rendah");
	}else {
		document.getElementById("mySubmit").disabled = false;
		$("#divCheckPrice").html("Harga Cocok");
	}
}
</script>
@stop