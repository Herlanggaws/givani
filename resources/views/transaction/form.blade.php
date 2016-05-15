<div class="form-group">
	{!! Form::label('date', 'Tanggal',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('date', null, ['class'=> 'form-control1', 'id'=>'datepicker', 'placeholder'=>'Tanggal Transaksi']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('description', 'Keterangan',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('description', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Keterangan Transaksi']) !!}
	</div>
</div>

<hr/>
<div id="total">
	Total : 0
</div>
<hr/>

<input type="hidden" id="fieldCounter" name="counter">

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>
					Nama Barang
				</th>
				<th>
					Jumlah		
				</th>
				<th>
					Harga
				</th>
				<th>
					Subtotal
				</th>
			</tr>

		</thead>
		<tbody id="dynamicInput">
			<tr>
				<td>
				</td>
				<td>
				</td>
			</tr>

		</tbody>
	</table>
</div>

<hr/>

<div class="form-group">
	{!! Form::label('chose', 'Pilih Barang',['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-8">
		<select data-placeholder="Pilih Barang..." class="chosen-select" style="width:350px;" tabindex="2" name="item" id="itemId">
			<option value=""></option>

			@foreach($customer->prices as $price)
			@if($price->sellable == 1 && !$price->item->trashed())
			<option value="{{$price->id}}">{{$price->item->name}} - Rp. {{$price->custom_price}}</option>
			@endif
			
			@endforeach

		</select>
	</div>
</div>

<div class="form-group">
	{!! Form::label('qty', 'Jumlah',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::number('qty', null, ['class'=> 'form-control1', 'id'=>'qty', 'placeholder'=>'Jumlah']) !!}
	</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-sm-8">
		<input type="button"class="btn-warning btn" value="Tambah Barang" onClick="getItem('itemId', 'qty', 'dynamicInput');">
		<input type="button"class="btn-danger btn" value="Hapus Barang" onClick="removeInput('dynamicInput');">
	</div>
</div>

<div>
	{!! Form::submit($buttonName,['class'=>'btn-success btn', 'id'=>'mySubmit']) !!}
</div>



<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-md-8">
		
	</div>
</div>



<script type="text/javascript">

var counter = 0;
var limit = 3;
var total = 0;

$(document).ready(function () {
	$("#fieldCounter").change(checkCounter);
	checkCounter();
});

function checkCounter(){
	if (counter>0){
		document.getElementById("mySubmit").disabled = false;
	} else {
		document.getElementById("mySubmit").disabled = true;
	}
}
function addInput(divName, itemId, itemName, qty){
	var newdiv = document.createElement('tr');

	var tdItemName ="<td><input class='form-control1' id='focusedinput' type='hidden' name='price_id"+counter+"' value='"+itemId+"'>"+getName(itemName)+"</td>";
	var tdQty ="<td><input class='form-control1' id='focusedinput' type='hidden' name='qty"+counter+"' value='"+qty+"'>"+qty+"</td>";
	var tdPrice = "<td>"+getPrice(itemName)+"</td>";
	var tdSubtotal = "<td><input class='form-control1' id='subtotal"+counter+"' type='hidden' name='subtotal"+counter+"' value='"+getSubtotal(itemName,qty)+"'>"+getPrice(itemName)*qty+"</td>";
	newdiv.innerHTML = tdItemName+tdQty+tdPrice+tdSubtotal;
	document.getElementById(divName).appendChild(newdiv);
	$("#getId"+counter).change(function(){

		$.get( "get_goods_detail", { id: $(this).val() } )
		.done(function( data ) {
			alert( "Data Loaded: " + data );
		});
	});
	counter++;
	updateCounter();
}

function getName(arrayString){
	indexOfStrip = arrayString.indexOf("-");
	name = arrayString.substring(0,indexOfStrip);
	return name;

}

function getPrice(arrayString){
	indexOfStrip = arrayString.indexOf(".")+1;
	price = arrayString.substring(indexOfStrip, arrayString.length);
	return price;
}

function getSubtotal(arrayString, qty){
	var subtotal = getPrice(arrayString)*qty;
	addTotal(subtotal);
	return subtotal;
}

function addTotal(subtotal){
	total = total+subtotal;
	document.getElementById("total").innerHTML = "Total: "+total;
}

function decreaseTotal(subtotal){
	total = total-subtotal;
	document.getElementById("total").innerHTML = "Total: "+total;
}

function removeInput(divaName){
	var subtotal;
	if(counter>0){
		var id = counter-1;
		subtotal = document.getElementById("subtotal"+id).value

		decreaseTotal(subtotal);
		document.getElementById(divaName).lastChild.remove();
		
		counter--;	
	}
	updateCounter();
}

function updateCounter(){
	document.getElementById('fieldCounter').value = counter;
	checkCounter();
	// "<input type='text' id='fieldCounter' name='counter' value='"+counter+"'>";
}

function getItem(item, qty, divaName){
	var itemId = document.getElementById(item);
	var itemIndex = itemId.selectedIndex;
	var itemOptions = itemId.options;
	var itemName = itemOptions[itemIndex].text;
	var tampQty = document.getElementById(qty).value;


	if(isNaN(itemId.value) || itemId.value=="" || isNaN(tampQty) || tampQty ==""){
		alert('anda belum memilih barang atau jumlah barang');
	}else{
		addInput(divaName, itemId.value, itemName, tampQty);
	}

	document.getElementById("qty").value = "";
	$('.chosen-control').val('').trigger("chosen:updated");
}
</script>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script> -->
<script src="{{ URL::asset('assets/js/chosen.jquery.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/prism.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var config = {
	'.chosen-select'           : {},
	'.chosen-select-deselect'  : {allow_single_deselect:true},
	'.chosen-select-no-single' : {disable_search_threshold:10},
	'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
	'.chosen-select-width'     : {width:"95%"}
}
for (var selector in config) {
	$(selector).chosen(config[selector]);
}
</script>



