<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WebAdmin - Detail Informasi Driver</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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
                        Detail Informasi Driver
                    </h1>
                </section>
                
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                   
          <!-- Widget: user widget style 1 -->
      
              <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Semua Transaksi</span>
              <span class="info-box-number"><h3><b><?php echo $jumlah[0]['jumlah']; ?></b></h3></span>
            
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
              <span class="info-box-text">Transkasi Berhasil</span>
              <span class="info-box-number"><h3><b><?php echo $jumlahstatus[0]['status']; ?></b></h3></span>
         
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Transaksi Dibatalkan</span>
              <span class="info-box-number"><h3><b><?php echo $statuscancel[0]['cancel']; ?></b></h3></span>
  
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><img src="<?php echo base_url() . "fotodriver/" . $driver[0]['foto'] ?>" height="80x" widht="80x"></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $driver[0]['nama_depan']." " .$driver[0]['nama_belakang']; ?></span>
              <span class="info-box-number"> <b>USD <?php echo $saldo[0]['saldo']; ?></b></span>
              <p>Phone : <b><?php echo $driver[0]['no_telepon']; ?></b> </p>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
          <!-- /.widget-user -->
       
</div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Detail Informasi Driver</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <table class="table table-striped">
                                                <tr>
                                                    <td><b>Id Driver </b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['id']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Awal </b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['nama_depan']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>nama Belakang </b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['nama_belakang']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No KTP </b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['no_ktp']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Tempat Lahir </b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['tempat_lahir']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Tanggal Lahir </b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['tgl_lahir']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No Hp </b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['no_telepon']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat Email </b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['email']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Saldo </b></td>
                                                    <td><p style="font-size:19px"class="text-left">: Rp <?php echo $saldo[0]['saldo']; ?></p>
                                                    <p style="font-size:10px" class="text-left"><?php echo $saldo[0]['update_at']; ?></p>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td><b>Pekerjaan  </b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['driver_job']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Ranting </b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['rating']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Status :</b></td>
                                                    <td><p class="text-left">: 
                                                            <?php
                                                            if ($driver[0]['status_user'] == 'aktif') {
                                                                echo '<span class="label label-success">Aktif</span>';
                                                            } else if ($driver[0]['status_user'] == 'non aktif') {
                                                                echo '<span class="label label-info">Non Aktif</span>';
                                                            } else if ($driver[0]['status_user'] == 'banned') {
                                                                echo '<span class="label label-danger">Banned</span>';
                                                            }
                                                            ?>
                                                        </p>
                                                        <a  href="<?php echo base_url(); ?>index.php/Listdriver/editStatusForm/<?php echo $driver[0]['id']; ?>" style="margin-top: -28px"class="btn btn-primary btn-xs pull-right" href="#" role="button">Perbarui Status Driver</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url() . "fotodriver/" . $driver[0]['foto'] ?>" class="img-responsive img-thumbnail" alt="Cinque Terre">

                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <!--bekas tempat BUTTON--> 
                                        </div>

                                    </div><br>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-6">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Data Kendaraan </h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <!--Merek
                                    Tipe
                                    Jenis
                                    No Kendaraan
                                    Warna-->
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <table class="table table">
                                                <tr>
                                                    <td><b>Jenois Kendaraan</b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['jenis_kendaraan']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Tipe Kendaraan</b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['tipe']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No Kendaraan. </b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['nomor_kendaraan']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Warna </b></td>
                                                    <td><p class="text-left">: <?php echo $driver[0]['warna']; ?></p></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>

                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->

                        <div class="col-xs-6">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Transaksi Terakhir</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <!--Merek
                                    Tipe
                                    Jenis
                                    No Kendaraan
                                    Warna-->
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Id Pesanan</th>
                                                        <th>Layanan</th>
                                                        <th>Pelanggan</th>
                                                        <th>Status</th>
                                                        <th>Waktu Order</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($transaksi as $value) { ?>
                                                        <tr>
                                                            <td><?php echo $value->id; ?></td>
                                                            <td><?php
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
                                                                        echo '<span class="label label-success">Success</span>';
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
                                                                <div class = "sparkbar" data-color = "#00a65a" data-height = "20"><?php echo $value->waktu; ?></div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ;
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
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
        <!-- DataTables -->
        <script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
        <!-- page script -->
        <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
        </script>
    </body>
</html>

