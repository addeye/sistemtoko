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
    <body>
    <?php var_dump($struck)?>
        <div align="center">
            <table width="600" border="0" cellpadding="5" cellspacing="0">
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
            =========================================================================
            <table>

            </table>
            <table width="600" border="0" cellpadding="5" cellspacing="0">
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
