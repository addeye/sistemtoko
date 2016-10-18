<div class="form-group">
    <label class="col-sm-4 control-label">Kode Barang</label>
    <div class="col-sm-4">
        <p class="form-control-static"><?=$item->code?></p>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Terakhir Opname</label>
    <div class="col-sm-4">
        <?php if(!count($opname)){echo '<p>-</p>';} else { ?>
            <?php foreach($opname as $row): ?>
                <p class="form-control-static"><?=$row->date?></p>
            <?php endforeach; } ?>
    </div>
</div>