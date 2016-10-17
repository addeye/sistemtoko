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
                            <th>Date</th>
                            <th>Total</th>
                            <th>Tunai</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($trans as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->number ?></td>
                                <td><?= tgl_indo_waktu($row->date) ?></td>
                                <td><?= rupiah($row->grand_total) ?></td>
                                <td><?= rupiah($row->cash) ?></td>
                                <td>
                                    <a href="<?=$edit?>/<?=$row->id?>" class="btn btn-success">Lihat</a>
                                </td>
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