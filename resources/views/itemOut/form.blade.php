<div class="form-group">
	{!! Form::label('date', 'Tanggal',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('date', null, ['class'=> 'form-control1', 'id'=>'datepicker', 'placeholder'=>'Tanggal Masuk']) !!}
	</div>
</div>
<div class="form-group">
	{!! Form::label('description', 'Keterangan',['class'=>'col-sm-2 control-label']) !!}

	<div class="col-sm-8">
		{!! Form::text('description', null, ['class'=> 'form-control1', 'id'=>'focusedinput', 'placeholder'=>'Keterangan Produksi']) !!}
	</div>
</div>

<input type="text" id="fieldCounter" name="counter" value="1">


<div class="table-responsive">
	<table class="table">


		<thead>
			<tr>
				<th>
					Kode Barang
				</th>
				<th>
					Jumlah		
				</th>
			</tr>

		</thead>
		<tbody id="dynamicInput">
			<tr>

				<td><input class="form-control1" id="focusedinput" type="text" name="item_id0"></td>
				<td><input class="form-control1" id="focusedinput" type="number" name="qty0"></td>
			</tr>

		</tbody>
	</table>
</div>

<div>
	<input type="button"class="btn-warning btn" value="Tambah Barang" onClick="addInput('dynamicInput');">
	<input type="button"class="btn-danger btn" value="Hapus Barang" onClick="removeInput('dynamicInput');">
	{!! Form::submit($buttonName,['class'=>'btn-success btn']) !!}
</div>



<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-md-8">
		
	</div>
</div>

<script type="text/javascript">
var counter = 1;
var limit = 3;
function addInput(divName){
	
	var newdiv = document.createElement('tr');
	newdiv.innerHTML = "<td><input class='form-control1' id='focusedinput' type='text' name='item_id"+counter+"'></td><td><input class='form-control1' id='focusedinput' type='number' name='qty"+counter+"'></td>";
	document.getElementById(divName).appendChild(newdiv);
	counter++;
	updateCounter();
}

function removeInput(divaName){
	if(counter>1){
		document.getElementById(divaName).lastChild.remove();
		counter--;	
	}
	updateCounter();
}

function updateCounter(){
	document.getElementById('fieldCounter').value = counter;
	// "<input type='text' id='fieldCounter' name='counter' value='"+counter+"'>";
}
</script>




