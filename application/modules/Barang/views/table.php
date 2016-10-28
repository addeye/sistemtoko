<div class="table-responsive">
    <span class="pull-left">TOTAL <?=$all?> DATA</span>
    <table id="" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Barkode</th>
            <th>Name</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = $this->uri->segment('4') + 1; foreach($barang as $row) {?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row->code?></td>
                <td><?=$row->barcode?></td>
                <td><?=$row->name?></td>
                <td><?=$row->harga_beli?></td>
                <td><?=$row->harga_jual?></td>
                <td><?=$row->stock?></td>
                <td>
                    <a class="btn btn-success btn-xs" href="<?=$link_edit.$row->id?>">Edit</a>
                    <a class="btn btn-danger btn-xs del" href="javascript:void(0);" id="<?=$row->id?>">Del</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-md-12">
        <span class="pull-right"><?php echo $halaman; ?></span>
    </div>
</div>

<input type="hidden" id="iddel">

<script>
    $(function(){
        ajax_paging = function(href)
        {
            val = $('#text-search').val();
                $.ajax({
                    beforeSend:function(){
                        $("#loading").modal('show');
                    },
                    type: "POST",
                    data: {text:val},
                    url: href,
                    success: function(html){
                        $("#loading").modal('hide');
                        $(".view-table").html(html);
                    }
                });
                return false;

        };
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