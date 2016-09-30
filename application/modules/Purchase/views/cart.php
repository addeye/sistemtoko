<div class="box-body">
    <table id="" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Satuan</th>
            <th>Total</th>
            <th style="width: 40px;">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($DPo as $row){?>
            <tr>
                <td><?=$row->barang->code?></td>
                <td><?=$row->barang->name?></td>
                <td><?=$row->qty?> <?=$row->unit?></td>
                <td><?=$row->piece?></td>
                <td><?=$row->piece*$row->qty?></td>
                <td>
                    <button id="<?=$row->id?>" class="btn btn-danger btn-xs btn-hapus"><i class="glyphicon glyphicon-trash"></i></button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div><!-- /.box-body -->
<input type="hidden" id="urlHapus" value="<?=site_url('purchase/po/deleteCart/')?>">

<script>
            $('.btn-hapus').click(function(){
            id = this.id;
            urlsub = $('#urlHapus').val();
            urlhapus = urlsub+'/'+id;

            $.ajax({
                url: urlhapus,
                type : 'get',
                cache: false,
            })

                .done(function( ) {
                    kolom();
                });
        });
</script>