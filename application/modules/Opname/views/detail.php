<div class="form-group">
    <label class="col-sm-4 control-label">Kode Barang / Stock</label>
    <div class="col-sm-4">
        <p class="form-control-static"><?=$item->code?> / Stock <?=$item->stock?></p>
        <input type="hidden" id="stock" name="stock" value="<?=$item->stock?>">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Terakhir Opname</label>
    <div class="col-sm-4">
        <?php if(!count($opname)){echo '<p>-</p>';} else { ?>
            <?php foreach($opname as $row): ?>
                <p class="form-control-static"><?=tgl_indo($row->date)?></p>
            <?php endforeach; } ?>
    </div>
</div>