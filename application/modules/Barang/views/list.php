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
                        <div class="pull-right"><a href="<?=$link_add?>" class="btn btn-primary">Tambah</a></div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-3 pull-right">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Nama Barang" id="text-search" value="<?=$this->session->has_userdata('text')?$this->session->text:''?>">
                                    <span class="input-group-btn"><button class="btn btn-info btn-flat" id="btn-search" type="button">Go!</button></span>
                                    <span class="input-group-btn"><button class="btn btn-warning btn-flat" id="btn-clear" type="button">Clear!</button></span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="view-table">

                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<div class="modal fade" id="loading" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Loading ....</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<input type="hidden" id="iddel">
<input type="hidden" id="url" value="<?=$link_delete?>">
<input type="hidden" id="urlTable" value="<?=$link_table?>">

<!-- page script -->
<script type="text/javascript">
    $(function () {
        kolom();

        $('.del').click(function(){
            $('#mymodal').modal('show');
            $('#iddel').val(this.id);
        });
        $('.act_del').click(function(){
            var $url = $('#url').val();
            var id = $('#iddel').val();
            $.ajax({
                url : $url+'/'+id,
                type: 'get',
                cache: false,
            })
                .success(function(){
                    /*optional stuff to do after success */
                    $('#mymodal').modal('hide');
                })
                .done(function(){
                    location.reload(true);
                });
        });
    });

    $('#btn-clear').click(function(){
        valText = $('#text-search').val('');
        kolom()
    });

    $('#btn-search').click(function(){
        kolom();
    });


    function kolom()
    {
        site_url = $('#urlTable').val();
        valText = $('#text-search').val();
        $.ajax({
            beforeSend:function(){
                $("#loading").modal('show');
            },
            url: site_url,
            type : 'post',
            data : {text:valText},
            cache: false,
        })
            .done(function( data ) {
                $("#loading").modal('hide');
                $(".view-table").html(data);
            });
    }
</script>