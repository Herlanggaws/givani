<html>
<head>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
	<link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ URL::asset('assets/dist/css/AdminLTE.min.css')}}"> 
	<style>
		img {
			max-width: 100%;
			height: auto;
		}
	</style>
</head> 

<body onload="window.print();">
	<div>
		<!-- Main content -->
		<section>
			<!-- title row -->
			<div >
				<div class="col-xs-12">

					<div class="table-responsive">
						<table>
							<tr>
								<td width="50%">
									<img src="{{ URL::asset('assets/img/mlks_logo.jpg')}}"  width="200">	
								</td>
								<td width="50%" align="center">
								<p align="center" style="font-size: 70%;">
										<b>PD GIVANI JAYA</b>
										<br>
										<i>Millitary Clothing Line</i>
										<br>
										Toko : Jln Arjuna K34 . Rumah : Bumi Asri Cijerah C 194 06/08
										<br>
										<b>BANDUNG</b>
										<br>
										<i>WWW.GIVANIJAYA.COM</i>
									</p>
								</td>
							</tr>
						</table>
					</div>

					

					
				</div>
				<!-- /.col -->
			</div>
		</section>
	</div>




	<section>



		<div id="page-wrapper">

			<div class="graphs">

				<div class="xs tabls">

					<div class="bs-example4" data-example-id="simple-responsive-table">
						@yield('content')
						

					</div>
				</div>
			</div>
		</div>
		
	</section>
</body>

