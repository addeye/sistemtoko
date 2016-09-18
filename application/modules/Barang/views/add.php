<link href="<?=base_url('assets/adminlte/plugins/select2/select2.min.css')?>" rel="stylesheet" />
<link href="<?=base_url('assets/adminlte/plugins/select2/select2-bootstrap.css')?>" rel="stylesheet" />
<link href="<?=base_url('assets/adminlte/plugins/select2/select2-bootstrap.min.css')?>" rel="stylesheet" />
<script src="<?=base_url('assets/adminlte/plugins/select2/select2.min.js')?>"></script>

<script type="text/javascript">

    $(document).ready(function() {

        $('.select2').select2({
            theme: "bootstrap"
        });
    });

</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?=$title?>
            <small><?=$sub_title?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?=site_url('front')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><?=$title?></a></li>
            <li class="active"><?=$sub_title?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$sub_title?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form class="form-horizontal" action="<?=$action_link?>" method="post">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Kode</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="code" value="<?=$kode?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Barcode</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="barcode" placeholder="Barcode Barang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Name</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="name" placeholder="Nama Barang">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Kategori</label>
                                <div class="col-sm-4">
                                    <select name="category" class="form-control select2">
                                        <option value="">Pilih Kategori</option>
                                        <?php
                                        foreach($category as $cat)
                                        {
                                        ?>
                                            <option value="<?=$cat->id?>"><?=$cat->name?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Harga Beli</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="buy_price" name="buy_price" placeholder="Harga Beli Barang">
                                </div>
                                <div class="col-sm-2">
                                    <label id="harga_beli"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Harga Jual</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="sale_price" name="sale_price" placeholder="Harga Jual Barang">
                                </div>
                                <div class="col-sm-2">
                                    <label id="harga_jual"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Stok Barang</label>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" name="stock">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?=$link_back?>" class="btn btn-warning">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
    function toRp(a,b,c,d,e){e=function(f){return f.split('').reverse().join('')};b=e(parseInt(a,10).toString());for(c=0,d='';c<b.length;c++){d+=b[c];if((c+1)%3===0&&c!==(b.length-1)){d+='.';}}return'Rp.\t'+e(d)+',00'}
    var buyprice = $('#buy_price');
    var saleprice = $('#sale_price');

    var thargabeli = $('#harga_beli');
    var tharagjual = $('#harga_jual');

    buyprice.keyup(function(){
        thargabeli.html(toRp(buyprice.val()));
    });

    saleprice.keyup(function(){
        tharagjual.html(toRp(saleprice.val()));
    });
</script>
