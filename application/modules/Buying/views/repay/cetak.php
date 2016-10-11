<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 19/09/2016
 * Time: 11:05
 */

?>

<html>
<head>
    <title>Purchase Order <?=$tr->number?></title>
</head>
<body onload="window.print()">

<div align="center">
    <table width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td>Faktur</td>
            <td><?=$tr->number?></td>
            <td>TGL_FAKTUR</td>
            <td><?=human_date($tr->date)?> </td>
        </tr>
        <tr>
            <td>SUPPLIER</td>
            <td><?=$tr->supp->name?></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>KETERANGAN</td>
            <td><?=$tr->note?></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <hr>
    <table width="100%" border="1" cellpadding="10" cellspacing="0">
        <thead>
        <tr>
            <td>Kode</td>
            <td>Nama Barang</td>
            <td>Qty</td>
            <td>Satuan</td>
            <td>Total</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($tr->detail as $row){?>
            <tr>
                <td><?=$row->items->code?></td>
                <td><?=$row->items->name?></td>
                <td><?=$row->qty?> <?=$row->unit?></td>
                <td><?=$row->piece?></td>
                <td><?=$row->piece*$row->qty?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <hr>
    <table style="text-align: center" width="100%" border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td width="200">Diketahui Oleh, </td>
            <td>Diterima Oleh, </td>
            <td>Operator, </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Toko Rachmad</td>
            <td>(_______________)</td>
            <td><?=$tr->employee?></td>
        </tr>
    </table>
</div>
</body>
</html>
