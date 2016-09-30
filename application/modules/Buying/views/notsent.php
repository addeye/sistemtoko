<!-- DATA TABLES -->
<link href="<?=base_url('assets/adminlte/plugins/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />

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
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Faktur</th>
                                <th>Tanggal</th>
                                <th>Supplier</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($data as $row) {?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><a href="<?=site_url('purchase/po/detail/'.$row->id)?>"><?=$row->number?></a></td>
                                    <td><?=tgl_indo($row->date)?></td>
                                    <td><?=$row->sup->name?></td>
                                    <td>
                                        <!-- Split button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn <?=$row->btn?>"><?=$row->status?></button>
                                            <button type="button" class="btn <?=$row->btn?> dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?=$link_accepted?><?=$row->id?>"> <i class="glyphicon glyphicon-send"></i> Terkirim</a></li>
                                                <li><a href="<?=$link_disaccepted?><?=$row->id?>"> <i class="glyphicon glyphicon-remove"></i> Belum</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<input type="hidden" id="iddel">
<input type="hidden" id="url" value="<?=$link_delete?>">

<!-- DATA TABES SCRIPT -->
<script src="<?=base_url('assets/adminlte/plugins/datatables/jquery.dataTables.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/adminlte/plugins/datatables/dataTables.bootstrap.min.js')?>" type="text/javascript"></script>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
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
</script>