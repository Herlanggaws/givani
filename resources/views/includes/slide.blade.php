<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <h1><a href="index.html">Givani <span>Admin</span></a></h1>
    </div>
    <div class="logo-icon text-center">
        <a href="index.html"><i class="lnr lnr-home"></i> </a>
    </div>

    <!--logo and iconic logo end-->
    <div class="left-side-inner">

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">

            <li class="menu-list"><a href="#"><i class="lnr lnr-book"></i>  <span>Data</span></a> 
                <ul class="sub-menu-list">
                    <li><a href="{{ URL::to('user/') }}">Pengguna</a> </li>
                    <li><a href="{{ URL::to('customer/') }}">Pelanggan</a> </li>
                    <li><a href="#">Pembelian</a></li>
                </ul>
            </li>


            <li class="menu-list"><a href="#"><i class="lnr lnr-menu"></i>  <span>Barang</span></a> 
                <ul class="sub-menu-list">
                    <li><a href="{{ URL::to('type/') }}">Jenis Barang</a></li>
                    <li><a href="{{ URL::to('item/') }}">Stok Barang</a></li>
                    <li><a href="{{ URL::to('itemin/') }}">Barang Masuk</a></li>
                    <li><a href="#">Barang Keluar</a></li>
                </ul>
            </li>

            <li class="menu-list"><a href="#"><i class="lnr lnr-select"></i> <span>Transaksi</span></a>
                <ul class="sub-menu-list">
                    <li><a href="#">Barang Masuk</a> </li>
                    <li><a href="#">Barang Keluar</a></li>
                    <li><a href="#">Pembelian</a></li>
                </ul>
            </li>  
            

            <li class="menu-list">
                <a href="#"><i class="lnr lnr-cog"></i>
                    <span>Setting</span></a>
                </li>
            </ul>
            <!--sidebar nav end-->
        </div>
    </div>