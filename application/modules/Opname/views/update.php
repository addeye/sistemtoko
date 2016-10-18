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
                            <input type="hidden" name="id" value="<?=$supplier->id?>">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Kode</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="kode" value="<?=$supplier->kode?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Nama</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="name" placeholder="Nama Supplier" value="<?=$supplier->name?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Telepon</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="phone" placeholder="Telepon" value="<?=$supplier->phone?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Alamat</label>
                                <div class="col-sm-3">
                                    <textarea class="form-control" name="address" placeholder="Alamat Supplier"><?=$supplier->address?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Fax</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="fax" placeholder="Fax Supplier" value="<?=$supplier->fax?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="email" placeholder="Email Supplier" value="<?=$supplier->email?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Personal</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="personal" placeholder="Nama Pemilik/Personal" value="<?=$supplier->personal?>">
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
