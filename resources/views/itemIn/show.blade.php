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
            <h3 class="box-title">Detail Data Konsumen: MK-{{$itemIn->id}}</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('itemin/') }}">Kembali</a></li>
              <li><a href="#" >Cetak Bukti</a></li>
            </ol>
            <div class="table-responsive">
              <table class="table" style="width:0% !important">

                <tr>
                  <td ><b>Kode Masuk</b></td>
                  <td><b>&nbsp;:&nbsp;</b>MK-{{$itemIn->id}}</td>
                </tr>


                <tr>
                  <td><b>Tanggal Masuk</b></td>
                  <td><b>&nbsp;:&nbsp;</b>{{$itemIn->date}}</td>
                </tr>

                <tr>
                  <td><b>Keterangan</b></td>
                  <td><b>&nbsp;:&nbsp;</b>{{$itemIn->description}}</td>
                </tr>
              </table>

              <br/>
              <table id="example1" class="table table-bordered table-striped">


                <thead>
                  <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($DetailItemIns as $DetailItemIn)
                 <tr>
                  <td>BR-{{ $DetailItemIn->item_id }}</td>
                  <td>{{ $DetailItemIn->item->name }}</td>
                  <td>{{ $DetailItemIn->qty }}</td>
                </tr>
                
                @endforeach




              </tbody>
            </table>
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
  <!-- AdminLTE App -->
  
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













