<div class="box-body">
	<div class="form-group">
		{!! Form::label('name', 'Nama Barang') !!}
		{!! Form::text('name', null, ['class'=> 'form-control', 'id'=>'focusedinput', 'placeholder'=>'Nama Barang']) !!}
	</div>



	<div class="form-group">
		{!! Form::label('production_price', 'Harga Produksi') !!}
		{!! Form::number('production_price', null, ['class'=> 'form-control', 'id'=>'productionPrice', 'placeholder'=>'Harga Produksi', 'onKeyUp'=>'typPrice();']) !!}
	</div>

	<div class="form-group">
		
		<div class="col-sm-8">
			<div class="from-group registrationFormAlert" id="divCheckMinimumPrice">
			</div>
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('minimum_price', 'Harga Minimum') !!}
		{!! Form::number('minimum_price', null, ['class'=> 'form-control', 'id'=>'minimumPrice', 'placeholder'=>'Harga Minimum']) !!}
	</div>

	<div class="form-group">
		
		<div class="col-sm-8">
			<div class="from-group registrationFormAlert" id="divCheckPrice">
			</div>
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('price', 'Harga Jual') !!}

		
		{!! Form::number('price', null, ['class'=> 'form-control', 'placeholder'=>'Harga', 'id'=>'price']) !!}
		
	</div>

	<div class="form-group">
		{!! Form::label('minimum_stock', 'Stock Minimum') !!}

		{!! Form::number('minimum_stock', null, ['class'=> 'form-control', 'id'=>'focusedinput', 'placeholder'=>'Stock Minimum']) !!}

	</div>



	<div class="form-group">
		{!! Form::label('type_id', 'Jenis Barang') !!}
		
		{!!  Form::select('type_id', $typeList,null, array('class'=>'form-control select2', 'id'=>'selector1'))!!}
		
	</div>

	<div class="form-group">
		
		{!! Form::submit($buttonName,['class'=>'btn btn-primary', 'id'=>'mySubmit']) !!}
		
	</div>



</div>









@section('custom_javascript')
<script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>


<script type="text/javascript">
$(".select2").select2();
	$(document).ready(function () {
		$("#minimumPrice").keyup(checkMinimumPrice);
		$("#price").keyup(checkPrice);
		$("#productionPrice").keyup(typePrice);
		setDisable();
		typePrice();
		checkMinimumPrice;
		checkPrice();
	});

	function typePrice(){
		var productionPrice = parseInt($("#productionPrice").val());
		var minimumPrice =parseInt($("#minimumPrice").val());
		setDisable();
		if (productionPrice > 0 ){
			document.getElementById("price").disabled = false;
			document.getElementById("minimumPrice").disabled = false;

			if (productionPrice>minimumPrice){
				document.getElementById("price").value = "";
				document.getElementById("minimumPrice").value = "";
			}
		} else{
			setDisable();
			document.getElementById("price").value = "";
			document.getElementById("minimumPrice").value = "";
		}
	}

	function checkMinimumPrice() {
		var productionPrice = parseInt($("#productionPrice").val());
		var minimumPrice = parseInt($("#minimumPrice").val());
		var price =parseInt($("#price").val());

		if (productionPrice > minimumPrice || isNaN(minimumPrice)){
			$("#divCheckMinimumPrice").html("Harga Minimum Terlalu Rendah");
			document.getElementById("mySubmit").disabled = true;
		}else{
			if(minimumPrice>price){
				document.getElementById("price").value = "";
				checkPrice();
			}

			$("#divCheckMinimumPrice").html("Harga Minimum Cocok");
			document.getElementById("mySubmit").disabled = false;

		}
	}

	function checkPrice() {
		var minimumPrice = parseInt($("#minimumPrice").val());
		var price =parseInt($("#price").val());
		if (minimumPrice > price || isNaN(price)){
			$("#divCheckPrice").html("Harga Terlalu Rendah");
			document.getElementById("mySubmit").disabled = true;
		}else{
			$("#divCheckPrice").html("Harga Cocok");
			document.getElementById("mySubmit").disabled = false;

		}

	// checkMinimumPrice();
}

function setDisable(){
	document.getElementById("mySubmit").disabled = true;
	document.getElementById("price").disabled = true;
	document.getElementById("minimumPrice").disabled = true;
	
}
</script>
@stop

