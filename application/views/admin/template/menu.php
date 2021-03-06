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
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>User Manajemen</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('user/home')?>"><i class="fa fa-user"></i> User</a></li>
                    <li><a href="<?=site_url('activity/log')?>"><i class="fa fa-list"></i> Log Activity</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-database"></i>
                    <span>Master Data</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('barang/brg')?>"><i class="fa fa-diamond"></i> Barang</a></li>
                    <li><a href="<?=site_url('barang/brg/satuan')?>"><i class="fa fa-lemon-o"></i> Satuan</a></li>
                    <li><a href="<?=site_url('departement/depart')?>"><i class="fa fa-link"></i> Departemen</a></li>
                    <li><a href="<?=site_url('supplier/supp')?>"><i class="fa fa-user-md"></i> Supplier</a></li>
                    <li><a href="<?=site_url('member/mem')?>"><i class="fa fa-user-plus"></i> Member</a></li>
                    <li><a href="<?=site_url('bank/ban')?>"><i class="fa fa-credit-card"></i> Bank</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-truck"></i>
                    <span>Purchase Order (PO)</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('purchase/po/notsent')?>"><i class="fa fa-exclamation"></i> Status PO</a></li>
                    <li><a href="<?=site_url('purchase/po')?>"><i class="fa fa-list-alt"></i> Transaksi PO</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>Transaksi</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('buying/buy/')?>"><i class="fa fa-cubes"></i> Pembelian Barang</a></li>
                    <li><a href="<?=site_url('buying/repay')?>"><i class="fa fa-rotate-right"></i> Return Pembelian</a></li>
                    <li><a href="<?=site_url('buying/debt')?>"><i class="fa fa-credit-card"></i> Pelunasan Hutang</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-flag"></i>
                    <span>Stok Opname (SO)</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('opname/sop')?>"><i class="fa fa-cube"></i> Stok Opname</a></li>
                    <li><a href="<?=site_url('opname/sop/form')?>"><i class="fa fa-list-ol"></i> Cetak Daftar Opname</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i>
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
                    <i class="fa fa-file-text-o"></i>
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
                    <i class="fa fa-file-text-o"></i>
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