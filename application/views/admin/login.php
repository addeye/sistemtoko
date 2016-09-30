<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 08/08/2016
 * Time: 1:43
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Toko Rachmad | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?=base_url('assets/adminlte/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url('assets/adminlte/dist/css/AdminLTE.css')?>" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?=base_url('assets/adminlte/plugins/iCheck/square/blue.css')?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?=base_url('assets/adminlte/dist/js/html5shiv.min.js')?>"></script>
    <script src="<?=base_url('assets/adminlte/dist/js/respond.min.js')?>"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Toko</b>Rachmad</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <?=$this->session->flashdata('pesan')?>
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?=site_url('auth/do_login')?>" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Username"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" value="1"> Remember Me
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
            </div>
        </form>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="<?=base_url('assets/adminlte/plugins/jQuery/jQuery-2.1.4.min.js')?>"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?=base_url('assets/adminlte/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?=base_url('assets/adminlte/plugins/iCheck/icheck.min.js')?>" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
