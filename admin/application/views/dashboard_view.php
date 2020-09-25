<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WebAdmin - Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!--HEADER dan SIDEBAR include-->
            <?php include 'SIDEBAR.php'; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                    </h1>
                </section>
         

                <!-- Main content -->
                <section class="content">
<div class="row">
    
       <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Item</span>
              <span class="info-box-number"><b><?php echo $jumlahmakanan[0]['jumlah']//+$jumlahitem[0]['jumlah']; ?></b></span>
              <p>Jumlah Item</p>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Restauran</span>
              <span class="info-box-number"><b><?php echo $jumlahrestoran[0]['jumlah']; ?></b></span>
              <p>Restauran Terdaftar</p>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Toko</span>
              <span class="info-box-number"><b><?php echo $jumlahtoko[0]['jumlah']; ?></b></span>
              <p>Jumlah Toko Terdaftar</p>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Transaksi Mitra</span>
              <span class="info-box-number"><b><?php echo $jumlahttoko[0]['jumlah']+$jumlahtransaksifood[0]['jumlah']; ?></b></span>
              <p>Transaksi</p>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><b><?php echo $transaksiBulan[0]['jumlah']; ?></b></h3>
            <P> Detail Transaksi <b><?php echo date('F'); ?></b></P>

            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url(); ?>index.php/Dashboard/allTransaction" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $finish[0]['jumlah']; ?></h3>

              <p>Transaksi Selesai</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url(); ?>index.php/Dashboard/allTransaction" class="small-box-footer">Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $jumlahPelanggan1[0]['jumlah'] + $jumlahPelanggan2[0]['jumlah'] + $jumlahPelanggan3[0]['jumlah']; ?></h3>

              <p>Pelanggan Terdaftar</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url(); ?>index.php/Listpelanggan" class="small-box-footer">Selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $canceled[0]['jumlah']; ?></h3>

              <p>Transaksi Dibatalkan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url(); ?>index.php/Dashboard/allTransaction" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
 

                    <div class="row">
                        <div class="col-md-8">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Transaksi Bulanan</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-center">
                                                <strong>Transkasi : <?php echo date("Y"); ?></strong>
                                            </p>

                                            <div class="chart">
                                                <!-- Sales Chart Canvas -->
                                                <canvas id="salesChart" style="height: 200px;"></canvas>
                                            </div>
                                            <!-- /.chart-responsive -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./box-body -->

                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->


                        <div class="col-md-4">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Detail Transkasi</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <canvas id="pieChart" style="height: 169px; width: 339px;" height="152" width="305"></canvas>
                                            <br>
                                            <p class="text-center">
                                                Detail Transaksi Bulanan <?php echo date('F'); ?><br> 
                                                Total Transaksi : <b><?php echo $transaksiBulan[0]['jumlah']; ?></b>
                                            </p>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./box-body -->

                            </div>
                            <!-- /.box -->
                        </div>


                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <div class="col-md-8">

                            <!-- TABLE: LATEST ORDERS -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Total Transkasi</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Layanan</th>
                                                    <th>Pelanggan</th>
                                                    <th>No. Hp</th>
                                                    <th>Driver</th>
                                                    <th>Status</th>
                                                    <th>Pembayaran</th>
                                                    <th>Waktu Order</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php
                                                // var_dump($transaksiDriver)
                                                foreach ($transaksiDriver as $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $value->nomor; ?></td>
                                                        <td>         <?php
                                                            switch ($value->fitur) {
                                                                case 'Ojek':
                                                                    echo '<span class="label label-info">OJEK</span>';
                                                                    break;
                                                                case 'Taxi':
                                                                    echo '<span class="label label-info">Bidding</span>';
                                                                    break;
                                                                case 'Food':
                                                                    echo '<span class="label label-info">Food</span>';
                                                                    break;
                                                                case 'Box':
                                                                    echo '<span class = "label label-info">Kurir</span>';
                                                                    break;
                                                                case 'Cargo':
                                                                    echo '<span class = "label label-info">Truck</span>';
                                                                    break;
                                                                case 'Laundry':
                                                                    echo '<span class="label label-info">Market</span>';
                                                                    break;
                                                                default:
                                                                    break;
                                                            }
                                                            ?></td>
                                                        <td><?php echo $value->nama_depan . " " . $value->nama_belakang; ?></td>
                                                        <td><?php echo $value->no_telepon; ?></td>
                                                        <td>
                                                            <?php
                                                            if ($value->id_driver == 'D0') {
                                                                echo '-';
                                                            } else if (strpos($value->id_driver, 'M') !== FALSE) {
                                                                ?>
                                                                <a href="<?php echo base_url(); ?>index.php/Listdriver/detilMmassage/<?php echo $value->id_driver ?>">
                                                                    <?php echo $value->id_driver ?>
                                                                </a>
                                                                <?php
                                                            } else if (strpos($value->id_driver, 'T') !== FALSE) {
                                                                ?>
                                                                <a href="<?php echo base_url(); ?>index.php/Listdriver/detilMservice/<?php echo $value->id_driver ?>">
                                                                    <?php echo $value->id_driver ?>
                                                                </a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a href="<?php echo base_url(); ?>index.php/Listdriver/detilDriver/<?php echo $value->id_driver ?>">
                                                                    <?php echo $value->id_driver ?>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            switch ($value->status_transaksi) {
                                                                case 'contacting':
                                                                    echo '<span class="label label-info">Contacting</span>';
                                                                    break;
                                                                case 'bidding':
                                                                    echo '<span class="label label-info">Bidding</span>';
                                                                    break;
                                                                case 'success':
                                                                    echo '<span class="label label-info">Success</span>';
                                                                    break;
                                                                case 'rejected':
                                                                    echo '<span class = "label label-danger">Rejected</span>';
                                                                    break;
                                                                case 'canceled':
                                                                    echo '<span class = "label label-danger">Canceled</span>';
                                                                    break;
                                                                case 'finish':
                                                                    echo '<span class="label label-success">Finish</span>';
                                                                    break;
                                                                case 'start':
                                                                    echo '<span class="label label-info">Start</span>';
                                                                    break;
                                                                default:
                                                                    break;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($value->pakai_mpay == '0') {
                                                                echo 'cash';
                                                            } else {
                                                                echo 'mpay';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <div><?php echo $value->waktu; ?></div>
                                                        </td>
                                                    </tr> 
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer clearfix">

                                    <!--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>-->
                                    <a href="<?php echo base_url(); ?>index.php/Dashboard/allTransaction" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua Transaksi</a>
                                    <a href="<?php echo base_url(); ?>index.php/Dashboard/cancelTransaction" class="btn btn-sm btn-default btn-flat pull-right">Pesanan Dibatalkan</a>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-4">
                            <!-- Info Boxes Style 2 -->

                            <div class="info-box bg-yellow">  
                                <span class="info-box-icon"><i class="ion ion-person"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Pelanggan</span>
                                    <span class="info-box-number"><?php echo $jumlahPelanggan1[0]['jumlah'] + $jumlahPelanggan2[0]['jumlah'] + $jumlahPelanggan3[0]['jumlah']; ?></span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <span class="label label-success">Aktif</span> = <?php echo $jumlahPelanggan1[0]['jumlah']; ?> &nbsp&nbsp
                                        <span class="label label-info">Tidak-Aktif</span> = <?php echo $jumlahPelanggan2[0]['jumlah']; ?> &nbsp&nbsp
                                        <span class="label label-danger">Banned</span> = <?php echo $jumlahPelanggan3[0]['jumlah']; ?> 
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>


                            <div class="info-box bg-yellow">  
                                <span class="info-box-icon"><i class="ion ion-person"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Jumlah Driver</span>
                                    <span class="info-box-number"><?php echo $jumlahDriver1[0]['jumlah'] + $jumlahDriver2[0]['jumlah'] + $jumlahDriver3[0]['jumlah']; ?></span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <span class="label label-success">Aktif</span> = <?php echo $jumlahDriver1[0]['jumlah']; ?> &nbsp&nbsp
                                        <span class="label label-info">Tidak-Aktif</span> = <?php echo $jumlahDriver2[0]['jumlah']; ?> &nbsp&nbsp
                                        <span class="label label-danger">Banned</span> = <?php echo $jumlahDriver3[0]['jumlah']; ?> 
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><i class="ion ion-bag"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Transaksi</span>
                                    <span class="info-box-number"><?php echo $transaksiBulan[0]['jumlah']; ?></span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                    <span class="progress-description">
                                       Jumlah Transaksi Berhasil Bulan
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->


                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                        
          <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->


              <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; 2019 <a href="https://Go-Pickme.com/">Go-Pickme</a>.</strong> All rights
                reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab"></div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab"></div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url(); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="<?php echo base_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="<?php echo base_url(); ?>plugins/chartjs/Chart.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!--<script src="<?php echo base_url(); ?>dist/js/pages/dashboard2.js"></script>-->
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
        <script>
            $(function () {

                'use strict';

                /* ChartJS
                 * -------
                 * Here we will create a few charts using ChartJS
                 */

                //-----------------------
                //- MONTHLY SALES CHART -
                //-----------------------

                // Get context with jQuery - using jQuery's .get() method.
                var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
                // This will get the first returned node in the jQuery collection.
                var salesChart = new Chart(salesChartCanvas);

                var salesChartData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                    datasets: [
                        {
                            label: "2016",
                            fillColor: "rgba(60,141,188,0.9)",
                            strokeColor: "rgba(60,141,188,0.8)",
                            pointColor: "#3b8bba",
                            pointStrokeColor: "rgba(60,141,188,1)",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(60,141,188,1)",
                            data: [
<?php echo $bln1[0]['jumlah']; ?>, 
<?php echo $bln2[0]['jumlah']; ?>, 
<?php echo $bln3[0]['jumlah']; ?>, 
<?php echo $bln4[0]['jumlah']; ?>, 
<?php echo $bln5[0]['jumlah']; ?>, 
<?php echo $bln6[0]['jumlah']; ?>, 
<?php echo $bln7[0]['jumlah']; ?>, 
<?php echo $bln8[0]['jumlah']; ?>, 
<?php echo $bln9[0]['jumlah']; ?>, 
<?php echo $bln10[0]['jumlah']; ?>, 
<?php echo $bln11[0]['jumlah']; ?>, 
<?php echo $bln12[0]['jumlah']; ?>
                    ]
                }
            ]
        };

        var salesChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };

        //Create the line chart
        salesChart.Line(salesChartData, salesChartOptions);

        //---------------------------
        //- END MONTHLY SALES CHART -
        //---------------------------

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
            {
                value: <?php echo $bidding[0]['jumlah']; ?>,
                color: "#00a65b",
                highlight: "#E3F2E1",
                label: "Bidding"
            },
            {
                value: <?php echo $contacting[0]['jumlah']; ?>,
                color: "#00a68c",
                highlight: "#E3F2E1",
                label: "Contacting"
            },
            {
                value: <?php echo $success[0]['jumlah']; ?>,
                color: "#00a65a",
                highlight: "#E3F2E1",
                label: "Success"
            },
            {
                value: <?php echo $rejected[0]['jumlah']; ?>,
                color: "#f56954",
                highlight: "#E3F2E1",
                label: "Rejected"
            },
            {
                value: <?php echo $canceled[0]['jumlah']; ?>,
                color: "#f56979",
                highlight: "#E3F2E1",
                label: "Canceled"
            },
            {
                value: <?php echo $start[0]['jumlah']; ?>,
                color: "#00c0ef",
                highlight: "#E3F2E1",
                label: "Start"
            },
            {
                value: <?php echo $finish[0]['jumlah']; ?>,
                color: "#00a69a",
                highlight: "#E3F2E1",
                label: "Finish"
            }
        ];
        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: "#fff",
            //Number - The width of each segment stroke
            segmentStrokeWidth: 1,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: "easeOutBounce",
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: false,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
            //String - A tooltip template
            tooltipTemplate: "<%=value %> <%=label%>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
        //-----------------
        //- END PIE CHART -
        //-----------------

        /* jVector Maps
         * ------------
         * Create a world map with markers
         */
        $('#world-map-markers').vectorMap({
            map: 'world_mill_en',
            normalizeFunction: 'polynomial',
            hoverOpacity: 0.7,
            hoverColor: false,
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: 'rgba(210, 214, 222, 1)',
                    "fill-opacity": 1,
                    stroke: 'none',
                    "stroke-width": 0,
                    "stroke-opacity": 1
                },
                hover: {
                    "fill-opacity": 0.7,
                    cursor: 'pointer'
                },
                selected: {
                    fill: 'yellow'
                },
                selectedHover: {}
            },
            markerStyle: {
                initial: {
                    fill: '#00a65a',
                    stroke: '#111'
                }
            },
            markers: [
                {latLng: [41.90, 12.45], name: 'Vatican City'},
                {latLng: [43.73, 7.41], name: 'Monaco'},
                {latLng: [-0.52, 166.93], name: 'Nauru'},
                {latLng: [-8.51, 179.21], name: 'Tuvalu'},
                {latLng: [43.93, 12.46], name: 'San Marino'},
                {latLng: [47.14, 9.52], name: 'Liechtenstein'},
                {latLng: [7.11, 171.06], name: 'Marshall Islands'},
                {latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis'},
                {latLng: [3.2, 73.22], name: 'Maldives'},
                {latLng: [35.88, 14.5], name: 'Malta'},
                {latLng: [12.05, -61.75], name: 'Grenada'},
                {latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines'},
                {latLng: [13.16, -59.55], name: 'Barbados'},
                {latLng: [17.11, -61.85], name: 'Antigua and Barbuda'},
                {latLng: [-4.61, 55.45], name: 'Seychelles'},
                {latLng: [7.35, 134.46], name: 'Palau'},
                {latLng: [42.5, 1.51], name: 'Andorra'},
                {latLng: [14.01, -60.98], name: 'Saint Lucia'},
                {latLng: [6.91, 158.18], name: 'Federated States of Micronesia'},
                {latLng: [1.3, 103.8], name: 'Singapore'},
                {latLng: [1.46, 173.03], name: 'Kiribati'},
                {latLng: [-21.13, -175.2], name: 'Tonga'},
                {latLng: [15.3, -61.38], name: 'Dominica'},
                {latLng: [-20.2, 57.5], name: 'Mauritius'},
                {latLng: [26.02, 50.55], name: 'Bahrain'},
                {latLng: [0.33, 6.73], name: 'São Tomé and Príncipe'}
            ]
        });

        /* SPARKLINE CHARTS
         * ----------------
         * Create a inline charts with spark line
         */

        //-----------------
        //- SPARKLINE BAR -
        //-----------------
        $('.sparkbar').each(function () {
            var $this = $(this);
            $this.sparkline('html', {
                type: 'bar',
                height: $this.data('height') ? $this.data('height') : '30',
                barColor: $this.data('color')
            });
        });

        //-----------------
        //- SPARKLINE PIE -
        //-----------------
        $('.sparkpie').each(function () {
            var $this = $(this);
            $this.sparkline('html', {
                type: 'pie',
                height: $this.data('height') ? $this.data('height') : '90',
                sliceColors: $this.data('color')
            });
        });

        //------------------
        //- SPARKLINE LINE -
        //------------------
        $('.sparkline').each(function () {
            var $this = $(this);
            $this.sparkline('html', {
                type: 'line',
                height: $this.data('height') ? $this.data('height') : '90',
                width: '100%',
                lineColor: $this.data('linecolor'),
                fillColor: $this.data('fillcolor'),
                spotColor: $this.data('spotcolor')
            });
        });
    });
    
        </script>
    </body>
</html>
