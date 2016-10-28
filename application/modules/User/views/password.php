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
            <?=$this->session->flashdata('pesan')?>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$sub_title?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form class="form-horizontal" action="<?=site_url('user/home/do_pass')?>" method="post">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Password Baru</label>
                                <div class="col-sm-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label">Ulangi Password</label>
                                <div class="col-sm-3">
                                    <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Password" required>
                                    <p class="help-block text-alert"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-10">
                                    <button type="submit" class="btn btn-primary disabled" id="btn-simpan">Simpan</button>
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

    $('#repassword').keyup(function(){
        var pass = $('#password').val();
        if(pass == this.value)
        {
            $('.text-alert').html('<p style="color: blue;">Password Cocok</p>');
            console.log('betul');
            $('#btn-simpan').removeClass('disabled');
        }
        if(pass != this.value)
        {
            $('.text-alert').html('<p style="color: red;">Tidak Cocok</p>');
            console.log('salah');
        }
    });
</script>

