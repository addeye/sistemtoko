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
                    <?=var_dump($user)?>
                    <div class="box-body">
                        <form class="form-horizontal" action="<?=site_url('user/home/do_update')?>" method="post">
                            <input type="hidden" name="id" value="<?=$user->id?>">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Nama User</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="name" placeholder="Nama User" value="<?=$user->name?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?=$user->username?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="password" placeholder="Password">
                                    <p class="help-block">*kosongi jika tidak dirubah</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Level</label>
                                <div class="col-sm-3">
                                    <select name="level" class="form-control">
                                        <option value="">Pilih Level</option>
                                        <?php foreach($level as $lv) { ?>
                                            <option value="<?=$lv->id?>" <?=$user->level==$lv->id?'selected':''?> ><?=$lv->name?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input name="active" value="1" type="checkbox" <?=$user->active==1?'checked':''?>> Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?=site_url('user/home')?>" class="btn btn-warning">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
