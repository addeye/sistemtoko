<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-warning" href="<?=$link_back?>">Kembali</a>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($detail as $row):
                            $grantotal[] = $row->total;
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->item_detail->name ?></td>
                                <td><?= $row->qty  ?></td>
                                <td class="text-right"><?= rupiah($row->price) ?></td>
                                <td class="text-right"><?= rupiah($row->total) ?></td>
                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <th class="text-right" colspan="4">TOTAL</th>
                            <th class="text-right"><?=rupiah(array_sum($grantotal))?></th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- plugins -->
<script src="<?php echo base_url('assets/kasirweb/js/plugins/dataTables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/kasirweb/js/plugins/dataTables/dataTables.bootstrap.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>