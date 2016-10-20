<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>No</th>
        <th>Code</th>
        <th>Nama</th>
        <th>Stock</th>
        <th>Stock Nyata</th>
        <th>Minus</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($result as $row): ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$row->code?></td>
            <td><?=$row->name?></td>
            <td><?=$row->stock?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>