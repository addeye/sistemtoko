<div class="box-body">
    <form id="formsend">
        <input type="hidden" name="idpo" value="<?=$id?>">
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
                    <input type="checkbox" name="come[]" value="<?=$row->id?>" <?=$row->come?'checked':''?>>
                    <input type="hidden" name="id[]" value="<?=$row->id?>">
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <hr>
        <button type="button" id="myButton" data-loading-text="Loading..." class="btn btn-success btn-send" autocomplete="off">
            Simpan
        </button>
    </form>
</div><!-- /.box-body -->

<input type="hidden" id="urlSend" value="<?=site_url('purchase/po/ceklist_act/')?>">

<script>
    $('.btn-send').click(function(){
        url = $('#urlSend').val();
        var $btn = $(this).button('loading');

        $.ajax({
            url: url,
            type : 'post',
            data : $('#formsend').serialize(),
            cache: false,
        })

            .done(function( ) {
                kolom();
                $btn.button('reset');
            });
    });
</script>