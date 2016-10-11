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
            <form action="<?=$action_link?>" method="post">
                <div class="col-xs-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><?=$sub_title?></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Faktur</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="number" value="<?=$kode?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Supplier</label>
                                    <div class="col-sm-6">
                                        <select name="supplier" class="form-control select2" required>
                                            <option value="">Pilih Supplier</option>
                                            <?php foreach($supplier as $sup) {?>
                                                <option value="<?=$sup->id?>"><?=$sup->name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Catatan</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" name="note" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->

                <div class="col-xs-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Detail</h3>
                            <div class="pull-right">
                                <div class="">
                                    <button type="submit" class="btn btn-primary btn-xs">SIMPAN</button>
                                    <a href="<?=$link_back?>" class="btn btn-warning btn-xs">KEMBALI</a>
                                </div>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control datetimepicker2" name="date">
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </form>
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
