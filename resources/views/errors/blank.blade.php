@extends('layouts.default')
@section('content')
<div id="page-wrapper">
	<div class="graphs">
		<div class="error-main">
			<h3><i class="fa fa-exclamation-triangle"></i> <span></span></h3>
			<div class="col-xs-7 error-main-left">
				<span>Oops!</span>
				<p>{{$message}}</p>
				<!-- <div class="error-btn">
					<a href="index.html">Go back?</a>
				</div> -->
			</div>
			<div class="col-xs-5 error-main-right">
				<img src="{{ URL::asset('assets/images/7.png') }}" alt=" " class="img-responsive" />
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>

@stop