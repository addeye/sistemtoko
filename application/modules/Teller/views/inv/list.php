<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Barcode</th>
                            <th>Nama</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($barang as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->code ?></td>
                                <td><?= $row->barcode ?></td>
                                <td><?= $row->name ?></td>
                                <td><?= $row->buy_price ?></td>
                                <td><?= $row->sale_price ?></td>
                                <td><?= $row->stock ?></td>
                            </tr>
                        <?php endforeach ?>
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