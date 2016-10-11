<link href="<?=base_url('assets/adminlte/plugins/select2/select2.min.css')?>" rel="stylesheet" />
<link href="<?=base_url('assets/adminlte/plugins/select2/select2-bootstrap.css')?>" rel="stylesheet" />
<link href="<?=base_url('assets/adminlte/plugins/select2/select2-bootstrap.min.css')?>" rel="stylesheet" />
<script src="<?=base_url('assets/adminlte/plugins/select2/select2.min.js')?>"></script>

<script type="text/javascript">

    $(document).ready(function() {

        $('.select2').select2({
            theme: "bootstrap"
        });
        $('.datetimepicker2').datetimepicker({
            format:'DD/MM/YYYY'
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
            <li><a href="<?=site_url('/')?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><?=$title?></a></li>
            <li class="active"><?=$sub_title?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?=$this->session->flashdata('pesan')?>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$sub_title?></h3>
                        <div class="pull-right">
                            <button class="btn btn-info" onclick="loadOtherPage()"><i class="glyphicon glyphicon-print"></i> Cetak</button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Faktur</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?=$data->number?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-sm-3 control-label">Supplier</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?=$data->supp->name?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword" class="col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="2" readonly><?=$data->note?></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">TGL. Faktur</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?=human_date($data->date)?></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-10 col-lg-offset-1">
                            <form class="form-inline">
                                <div class="form-group">
                                    <select id="valbarang" class="form-control select2">
                                        <option value="">Pilih Barang</option>
                                        <?php foreach($barang as $brg){ ?>
                                            <option value="<?=$brg->id?>"><?=$brg->name?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" id="valqty" class="form-control" name="qty" placeholder="jumlah">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="unit" id="valunit">
                                        <option value="">Pilih Unit</option>
                                        <?php foreach($unit as $u){?>
                                            <option value="<?=$u->name?>"><?=$u->name?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" id="valpiece" class="form-control" name="piece" placeholder="Satuan">
                                </div>
                                <input type="hidden" name="tr" id="valtr" value="<?=$data->id?>">
                                <button type="button" class="btn btn-success btn-simpan"><i class="glyphicon glyphicon-plus"></i></button>
                                <a href="<?=site_url('buying/repay')?>" type="button" class="btn btn-warning"><i class="glyphicon glyphicon-backward"></i></a>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div id="view_cart">

                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<input type="hidden" id="url" value="<?=site_url('buying/repay/listCart/'.$data->id)?>">
<input type="hidden" id="urlSimpan" value="<?=site_url('buying/repay/addCart')?>">
<input type="hidden" id="urlcetak" value="<?=site_url('buying/repay/print_tr/'.$data->id)?>" >

<div class="modal fade" id="loading" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Loading ....</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
    kolom();
    $('.btn-simpan').click(function(){
        url_simpan = $('#urlSimpan').val();
        barang = $('#valbarang').val();
        qty = $('#valqty').val();
        unit = $('#valunit').val();
        tr = $('#valtr').val();
        piece = $('#valpiece').val();

        $.ajax({
            url: url_simpan,
            type : 'post',
            data : {tr:tr,item:barang,qty:qty,unit:unit,piece:piece},
            cache: false,
        })
            .done(function( ) {
                kolom();
            });
    });

    function kolom()
    {
        site_url = $('#url').val();
        $.ajax({
            beforeSend:function(){
                $("#loading").modal('show');
            },
            url: site_url,
            type : 'get',
            cache: false,
        })
            .done(function( data ) {
                $("#loading").modal('hide');
                $("#view_cart").html(data);
            });
    }

    function loadOtherPage() {
        var urlcetak = $("#urlcetak").val();
        $("<iframe>")                             // create a new iframe element
            .hide()                               // make it invisible
            .attr("src", urlcetak) // point the iframe to the page you want to print
            .appendTo("body");                    // add iframe to the DOM to cause it to load the page

    }
</script>