<?php
/**
 * Created by PhpStorm.
 * User: deyelovi
 * Date: 16/10/2016
 * Time: 15:40
 */
?>

<html>
    <head>
        <title></title>
    </head>
    <body onload="window.print()">
        <div align="center">
            <table style="font-size: 12px;" width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>TOKO RACHMAD</th>
                </tr>
                <tr>
                    <th>DESA BALONGABUS - CANDI</th>
                </tr>
                <tr>
                    <th>SIDOARJO</th>
                </tr>
            </table>
            <hr>
            <table style="font-size: 11px;" width="100%" border="0" cellpadding="5" cellspacing="0">
                <?php foreach($struck->detail as $row) {?>
                <tr>
                    <td>
                        <?=$row->barang->name?><br>
                        <span style="padding-left: 50px;"><?=$row->qty?>,00 &nbsp;&nbsp;&nbsp; x &nbsp;&nbsp;&nbsp;@ <?=rupiah($row->price)?></span>
                    </td>
                    <td></td>
                    <td align="right"><?=rupiah($row->total)?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="3"><hr></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right">Total</td>
                    <td align="right"><?=rupiah($struck->grand_total)?></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right">Tunai</td>
                    <td align="right"><?=rupiah($struck->cash)?></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right">Kembali</td>
                    <td align="right"><?=rupiah($struck->cash - $struck->grand_total)?></td>
                </tr>
            </table>
            <hr>
            <table style="font-size: 12px;" width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>BARANG YANG DIBELI TIDAK DAPAT KEMBALI</th>
                </tr>
                <tr>
                    <th>TERIMA KASIH ATAS KUNJUNGAN ANDA</th>
                </tr>
                <tr>
                    <th>#<?=$struck->number?>#<?=tgl_indo_waktu($struck->date)?>#<?=$struck->employee?></th>
                </tr>
            </table>
        </div>
    </body>
</html>
