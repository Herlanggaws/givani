@extends('layouts.app')

@section('custom_css')
<link href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- Theme style -->
<link href="{{ URL::asset('assets/dist/css/AdminLTE.min.css')}}" rel="stylesheet">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link href="{{ URL::asset('assets/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet">
  
  @stop

  @section('content')


  @if (session('message'))
  <div class="alert alert-success alert-dismissible">
    {{ session('message') }}
  </div>
  @endif
  <section class="content">
  	<div class="row">
  		<div class="col-xs-12">
  			<div class="box">
  				<div class="box-header">
  					<h3 class="box-title">Data Tipe Barang</h3>
  				</div>
  				<!-- /.box-header -->
  				<div class="box-body">
            <div>
              <a href="{{ URL::to('type/create') }}" class="btn btn-primary">Buat Data</a>
            </div>
            
            <br/>
            <table id="example1" class="table table-bordered table-striped">


              <thead>
               <tr>
                 <th>Name</th>
                 <th></th>
               </tr>
             </thead>
             <tbody>
               @foreach($types as $type)

               <tr>
                <td>{{ $type->name }}</td>

                <td>
                 <div class="btn-group">
                  <button type="button" class="btn btn-default btn-flat">Action</button>
                  <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                 </button>
                 <ul class="dropdown-menu" role="menu">
                   @if(Auth::user()->role == 'admin')
                   <li>
                    <a href="{{ URL::to('type/' . $type->id . '/edit') }}" class="btn btn-xs btn-link"> Edit </a>
                  </li>

                  <li>
                  <button class="btn btn-xs btn-link" data-toggle="modal" data-target="#myModal{{$type->id}}">
                     Hapus
                   </button>

                 </li>
                 @endif
               </ul>
             </div>


             <div class="modal fade" id="myModal{{$type->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
               <div class="modal-content">
                <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel"></h4>
               </div>
               <div class="modal-body">
                 Apa anda yakin untuk menghapus data {{$type->name}}?
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 {!! Form::model($type, ['method'=> 'DELETE', 'action' => ['TypeController@destroy', $type->id],'class'=>'btn btn-xs btn-link', 'onsubmit' => 'return ConfirmDelete()']) !!}
                 {!! Form::submit('Hapus',['class'=>'btn btn-warning']) !!}
                 {!! Form::close() !!}


               </div>
             </div>
           </div>
         </div>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       </td>
     </tr>

     @endforeach




   </tbody>
 </table>
</div>
<!-- /.box-body -->
<div class="box-footer">
 <a href="{{ URL::to('type/create') }}" class="btn btn-primary">Buat Data</a>
</div>
</div>

<!-- /.box -->
</div>
<!-- /.col -->
</div>
</section>

@stop


@section('custom_javascript')


<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ URL::asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('assets/plugins/fastclick/fastclick.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('assets/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
 $(function () {
  $("#example1").DataTable();
  $('#example2').DataTable({
   "paging": true,
   "lengthChange": false,
   "searching": false,
   "ordering": true,
   "info": true,
   "autoWidth": false
 });
});
</script>
@stop













