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
    <title>Purchase Order <?=$po->number?></title>
</head>
<body>

<div align="center" style="font-size: 9px;">
    <table width="100%" border="0" cellpadding="3" cellspacing="0">
        <tr>
            <td>FAKTUR</td>
            <td>: <?=$po->number?></td>
            <td>TGL FAKTUR</td>
            <td>: <?=human_date($po->date)?> </td>
        </tr>
        <tr>
            <td>SUPPLIER</td>
            <td>: <?=$po->supp->name?></td>
            <td>TERM</td>
            <td>: <?=term()[$po->term]?></td>
        </tr>
        <tr>
            <td>DISC</td>
            <td>: <?=$po->disc?></td>
            <td>JATUH TEMPO</td>
            <td>: <?=human_date($po->due_date)?></td>
        </tr>
        <tr>
            <td>PPN</td>
            <td>: <?=$po->ppn?>%</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>KETERANGAN</td>
            <td>: <?=$po->note?></td>
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
            <td>Konv</td>
            <td>Harga</td>
            <td>Total</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach($po->detail as $row){?>
            <tr>
                <td><?=$row->items->code?></td>
                <td><?=$row->items->name?></td>
                <td><?=$row->qty?> <?=$row->unit?></td>
                <td><?=$row->piece?></td>
                <td align="right"><?=rupiah($row->price)?></td>
                <td align="right"><?=rupiah($tot[]=$row->total)?></td>
            </tr>
        <?php } ?>
        <tr>
            <td align="center" colspan="5">TOTAL</td>
            <td align="right"><?=rupiah($finaltot = array_sum($tot))?></td>
        </tr>
        <tr>
            <td align="center" colspan="5">DISC ( <?=$po->disc?>% )</td>
            <td align="right"><?=rupiah($rpdiskon = diskon($po->disc,$finaltot))?></td>
        </tr>
        <tr>
            <td align="center" colspan="5">PPN ( <?=$po->ppn?>% )</td>
            <td align="right"><?=rupiah($ppn = diskon($po->ppn,$finaltot))?></td>
        </tr>
        <tr>
            <td align="center" colspan="5">NETTO</td>
            <td align="right"><?=rupiah($finaltot-$rpdiskon-$ppn)?></td>
        </tr>
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
            <td><?=$po->employee?></td>
        </tr>
    </table>
</div>
</body>
</html>
