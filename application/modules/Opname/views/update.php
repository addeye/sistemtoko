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
                            <input type="hidden" name="id" value="<?=$so->id?>">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Pilih Barang</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <select name="item" id="item" class="form-control select2">
                                        <option value="">Daftar Barang</option>
                                        <?php foreach($barang as $row): ?>
                                            <option value="<?=$row->id?>" <?=$row->id==$so->item?'selected':''?> ><?=$row->name?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div id="detail-item"></div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Stock Nyata / Minus</label>
                                <div class="col-sm-2">
                                    <input type="number" id="stock_nyata" class="form-control" name="real" placeholder="Stock Nyata" value="<?=$so->real?>">
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" id="minus" name="minus" placeholder="Minus" value="<?=$so->minus?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Keterangan</label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" name="note" placeholder="Keterangan"><?=$so->note?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Tanggal</label>
                                <div class="col-sm-2">
                                    <input type="text" name="date" class="form-control datetimepicker2" value="<?=human_date($so->date)?>">
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
<input type="hidden" id="urldetail" value="<?=site_url('opname/sop/detail_barang')?>">
<script>
    $(document).ready(function(){
        detail();
        $('#item').change(function(){
            detail();
        });

        $('#stock_nyata').keyup(function(){
            var stock = $('#stock').val();
            var stock_nyata = $('#stock_nyata').val();
            console.log(stock_nyata);
            var minus = parseInt(stock_nyata,10) - parseInt(stock,10);
            $('#minus').val(minus);
        });

        function detail()
        {
            var id = $('#item').val();
            var url = $('#urldetail').val();
            $.ajax({
                url: url+'/'+id,
                type : 'get',
                cache: false,
            })
                .success(function(data) {
                    $('#detail-item').html(data);
                });
        }
    });


</script>
