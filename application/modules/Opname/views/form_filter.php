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
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?=$sub_title?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form class="form-inline">
                            <label>From : </label>
                            <div class="form-group">
                                <select id="from" class="form-control">
                                    <option value="">Code</option>
                                    <?php foreach($barang as $row): ?>
                                        <option value="<?=$row->code?>"><?=$row->code?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <label>Sampai : </label>
                            <div class="form-group">
                                <select id="until" class="form-control">
                                    <option value="">Code</option>
                                    <?php foreach($barang as $row): ?>
                                        <option value="<?=$row->code?>"><?=$row->code?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-info search">Cari</button>
                            </div>
                        </form>
                        <hr>
                        <div id="view">

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

<input type="hidden" id="urlview" value="<?=$linkview?>">

<script>
    $(document).ready(function(){
        $('.search').click(function(){
            var site_url = $('#urlview').val();
            var from = $('#from').val();
            var until = $('#until').val();

            $.ajax({
                beforeSend:function(){
                    $("#loading").modal('show');
                },
                url: site_url,
                type : 'post',
                data: {from:from,until:until},
                cache: false,
            })
                .done(function( data ) {
                    $("#loading").modal('hide');
                    $("#view").html(data);
                });
        });
    });
</script>