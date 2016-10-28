<html>
<head></head>
<body onload="window.print()">
<div align="center">
    <h3>STOCK OPNAME BARANG</h3>
    <p>Tanggal <?=$date?> | Kode barang <?=$from?> - <?=$until?></p>
</div>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
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
</body>
</html>