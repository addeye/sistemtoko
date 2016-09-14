<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=base_url('assets/adminlte/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="<?=site_url('/')?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                </a>
            </li>
            <li class="">
                <a href="<?=site_url('user/home')?>">
                    <i class="fa fa-dashboard"></i> <span>User Manajemen</span></i>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Master Data</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Barang</a></li>
                    <li><a href="<?=site_url('departement/depart')?>"><i class="fa fa-circle-o"></i> Departemen</a></li>
                    <li><a href="<?=site_url('supplier/supp')?>"><i class="fa fa-circle-o"></i> Supplier</a></li>
                    <li><a href="<?=site_url('member/mem')?>"><i class="fa fa-circle-o"></i> Member</a></li>
                    <li><a href="<?=site_url('bank/ban')?>"><i class="fa fa-circle-o"></i> Bank</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Purchase Order (PO)</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Belum Terkirim</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Transaksi PO</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Transaksi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Pembelian Barang</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Return Pembelian</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Pelunasan Hutang</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Stok Opname (SO)</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Stok Opname</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Cetak Daftar Opname</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Laporan Barang</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Master Barang</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Nilai Aset Barang</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Kartu Stok</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Inventory Barang</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Supplier</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Member</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Laporan Umum</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Stok Opname</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Perubahan Harga Jual</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Pembelian Barang</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Return Pembelian</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Laporan Penjualan</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Omset Harian</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Barang (kode)</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Detail Penjualan</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Barang Terlaris</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Barang Pasif</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Member</a></li>
                    <li><a href="<?=site_url('content/page')?>"><i class="fa fa-circle-o"></i> Laba Penjualan</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>