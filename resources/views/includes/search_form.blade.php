{!! Form::open(['method'=>'GET','url'=>$url,null,'role'=>'search'])  !!}






<table style="float: right; !important" width="50%">
	<tr>
		<td width="50%">
			<div class="input-group in-grp1" style="margin: 0 0 0 0; width:90%; !important">							
				<span class="input-group-addon">
					<i class="fa fa-search"></i>
				</span>
				<input id="searchbox" type="text" class="form-control1" name= "search" placeholder="Search..." onkeydown="showHint(this.value)">
			</div>
		</td>
		<td width="50%">
			<div class="input-group" style="margin: 0 0 0 0; width:90%; !important">
				{!!  Form::select('category', $category,null, array('class'=>'form-control1', 'id'=>'selector1'))!!}
			</div>
		</td>
		<td>
			{!! Form::submit('Cari',['class'=>'btn-success btn']) !!}
		</td>
	</tr>
</table>

{!! Form::close() !!}

