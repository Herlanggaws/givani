<aside class="main-sidebar">

    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-database"></i> <span>Data</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ URL::to('user/') }}"><i class="fa fa-circle-o"></i> Pengguna</a> </li>
                    <li><a href="{{ URL::to('customer/') }}"><i class="fa fa-circle-o"></i> Pelanggan</a> </li>
                    <li><a href="{{ URL::to('transaction/') }}"><i class="fa fa-circle-o"></i> Transaksi</a> </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cube"></i> <span>Barang</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::to('type/') }}"><i class="fa fa-circle-o"></i> Jenis Barang</a> </li>
                    <li><a href="{{ URL::to('item/') }}"><i class="fa fa-circle-o"></i> Stok Barang</a> </li>
                    <li><a href="{{ URL::to('itemin/') }}"><i class="fa fa-circle-o"></i> Barang Masuk</a> </li>
                    <li><a href="{{ URL::to('itemout/') }}"><i class="fa fa-circle-o"></i> Barang Keluar</a> </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-desktop"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ URL::to('customer?page=transaction') }}"><i class="fa fa-circle-o"></i> Transaksi</a> </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>