
<script type="text/javascript">
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer",
            {

                title:{
                    text: "Penjualan dan Pembelian 30 Hari Terakhir",
                    fontSize: 30
                },
                animationEnabled: true,
                axisX:{

                    gridColor: "Silver",
                    tickColor: "silver",
                    valueFormatString: "MMM"

                },
                toolTip:{
                    shared:true
                },
                theme: "theme2",
                axisY: {
                    gridColor: "Silver",
                    tickColor: "silver"
                },
                legend:{
                    verticalAlign: "center",
                    horizontalAlign: "right"
                },
                data: [
                    {
                        type: "line",
                        showInLegend: true,
                        lineThickness: 2,
                        name: "Penjualan",
                        markerType: "square",
                        color: "#F08080",
                        dataPoints: [
                            <?php foreach($gsales as $row){?>
                            { x: new Date(<?=$row['year']?>,<?=$row['month']?>,1), y: <?=$row['y']?> },
                            <?php }?>
                        ]
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "Pembelian",
                        color: "#20B2AA",
                        lineThickness: 2,

                        dataPoints: [
                            <?php foreach($gbuy as $row){?>
                            { x: new Date(<?=$row['year']?>,<?=$row['month']?>,1), y: <?=$row['y']?> },
                            <?php }?>
                        ]
                    }


                ],
                legend:{
                    cursor:"pointer",
                    itemclick:function(e){
                        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                            e.dataSeries.visible = false;
                        }
                        else{
                            e.dataSeries.visible = true;
                        }
                        chart.render();
                    }
                }
            });

        chart.render();
    }
</script>
<script src="<?=base_url('assets/adminlte/dist/js/canvasjs.min.js')?>"></script>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?=rupiah($total_penjualan)?></h3>
                            <p>Penjualan 30 Hari Akhir</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?=$invoice?> Brg</h3>
                            <p>PO Belum Dikirim</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?=rupiah($buytotal)?></h3>
                            <p>Pembelian 30 Hari Akhir</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?=rupiah($kredit)?></h3>
                            <p>Sisa Hutang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <div class="col-md-12">
                        <!-- LINE CHART -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Line Chart</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <div id="chartContainer" style="height: 300px; width: 100%;">
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col (RIGHT) -->
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">5 Daftar Barang Terlaris</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-condensed">
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode/Nama Barang</th>
                                        <th style="width: 40px">Terjual</th>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>0000005 / ABC SAUCE TOMAT 135ML</td>
                                        <td>155</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>2700047/ MILNA BBR BY ORG BERS MRH 120G</td>
                                        <td>76</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>2600056/ HUKI DOT LATEX M/288 (CI0003)</td>
                                        <td>55</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>1300130 / MAMY POKO EXTR DRY NEWBORN S52</td>
                                        <td>49</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>0200015 / CUSSON MNYK RMBT ALVR ZATN 50M</td>
                                        <td>30</td>
                                    </tr>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Barang re-Order</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-condensed">
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kode/Nama Barang</th>
                                        <th style="width: 40px">Stock</th>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>4000006/ NICE TISSU WAJAH 2PLY 250'S</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>4000065/ DODO COTTON BD 123 EXT F 100PC</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>4100090/ OREO ICE CREAM BLUBERY 29.4GR</td>
                                        <td>7</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>5000007/ MOLTO ALLIN1 1XBILAS BR 300ML</td>
                                        <td>9</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>5000036/ DOWNY PEL/PEW PASION 6X20ML</td>
                                        <td>10</td>
                                    </tr>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Hutang Jatuh Tempo</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <table class="table table-condensed">
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>No Faktur</th>
                                        <th>Supplier</th>
                                        <th>Total</th>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td><a href="#">NF00005</a></td>
                                        <td>Sinar Sosro</td>
                                        <td>Rp. 3.252.000,00</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td><a href="#">NF00006</a></td>
                                        <td>HJ KUNTI AMANAH</td>
                                        <td>Rp. 2.200.000,00</td>
                                    </tr>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                </section><!-- /.Left col -->
            </div><!-- /.row (main row) -->
        </section><!-- /.content -->


    </div><!-- /.content-wrapper -->
