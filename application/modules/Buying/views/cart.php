<div class="box-body">
    <form id="formcart">
    <table id="" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Qty/Unit</th>
            <th>Konv</th>
            <th>Harga</th>
            <th>Total</th>
            <th style="width: 40px;">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(!$DPo)
        {
            echo '<tr><td colspan="7">Data Kosong</td></tr>';
        }
        else
        {
        foreach($DPo as $row){?>
            <input type="hidden" name="iddetail[]" value="<?=$row->id?>">
            <input type="hidden" name="iditem[]" value="<?=$row->item?>">
            <tr>
                <td><?=$row->barang->code?></td>
                <td><?=$row->barang->name?></td>
                <td>
                    <input style="width: 50px;" type="number" name="qty[]" value="<?=$row->qty?>">
                    <select name="unit[]" style="height: 27px;">
                        <option value="">Unit</option>
                        <?php foreach($unit as $u){ ?>
                            <option value="<?=$u->name?>" <?=$row->unit==$u->name?'selected':''?> ><?=$u->name?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <input style="width: 50px;" type="number" name="piece[]" value="<?=$row->piece?>">
                </td>
                <td class="text-right">
                    <input style="width: 80px; float: left;" type="number" name="price[]" value="<?=$row->price?>">
                    <?=rupiah($row->price)?></td>
                <td class="text-right"><?=rupiah($tot[] = $row->total)?></td>
                <td>
                    <button type="button" id="<?=$row->id?>" class="btn btn-danger btn-xs btn-hapus"><i class="glyphicon glyphicon-trash"></i></button>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <th class="text-right" colspan="5">TOTAL</th>
            <td class="text-right"><?=rupiah($finaltot = array_sum($tot))?></td>
            <td></td>
        </tr>
        <tr>
            <th class="text-right" colspan="5">DISC ( <?=$buy->disc?>% )</th>
            <td class="text-right"><?=rupiah($rpdiskon = diskon($buy->disc,$finaltot))?></td>
            <td></td>
        </tr>
        <tr>
            <th class="text-right" colspan="5">PPN ( <?=$buy->ppn?>% )</th>
            <td class="text-right"><?=rupiah($ppn = diskon($buy->ppn,$finaltot))?></td>
            <td></td>
        </tr>
        <tr>
            <th class="text-right" colspan="5">NETTO</th>
            <td class="text-right"><?=rupiah($finaltot-$rpdiskon-$ppn)?></td>
            <td></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <hr>
    <button type="button" class="btn btn-success simpancart">Simpan</button>
    </form>
</div><!-- /.box-body -->
<input type="hidden" id="urlHapus" value="<?=site_url('buying/buy/deleteCart/')?>">
<input type="hidden" id="urlMultipleCart" value="<?=site_url('buying/buy/multipleInsertCart')?>">

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
            $('.simpancart').click(function(){
                var data = $('#formcart').serialize();
                var urlMultiple = $('#urlMultipleCart').val();

                $.ajax({
                    url: urlMultiple,
                    type : 'post',
                    data : data,
                    cache: false,
                })

                    .done(function(data) {
//                        console.log(data);
                        kolom();
                    });
            });
</script>