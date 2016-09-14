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
                            <input type="hidden" name="id" value="<?=$bank->id?>">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Nama Bank</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="name" placeholder="Nama Bank" value="<?=$bank->name?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Atas Nama</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="personal" placeholder="Atas Nama" value="<?=$bank->personal?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">rekening</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="rekening" placeholder="No Rekening" value="<?=$bank->rekening?>">
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
