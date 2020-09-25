<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WebAdmin - List <?php echo "$tittle"; ?></title>
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
                           Total Driver <?php echo "$tittle"; ?>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
              
            <div class="inner">
              <h3><b><?php echo $daftar[0]['jumlah']; ?></b></h3>
            <P><b>Total Pendaftaran</b></P>

            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><b><?php echo $terima[0]['jumlah']; ?></b></h3>

              <p>Jumlah Diterima</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
       <div class="small-box bg-red">
            <div class="inner">
              <h3><b><?php echo $tolak[0]['jumlah']; ?></b></h3>

              <p>Jumlah Ditolak</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><b><?php echo $transaksi[0]['jumlah']; ?></b></h3>

              <p>Jumlah Transaksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Total Driver <?php echo "$tittle"; ?> Registered</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    Total Driver<?php echo $pesan; ?>

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Pekerjaan</th>
                                                <th>No Kendaraan.</th>
                                                <th>No Telepon</th>
                                                <th>Email</th>
                                                <th>Saldo</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($driver as $key) {
                                                ?>
                                                <tr>
                                                     <td><img src="<?php echo base_url() . "/fotodriver/" . $key->foto; ?>" height="50x" width="50x"></td>
                                                    <td><?php echo $key->nama_depan . " " . $key->nama_belakang; ?></td>
                                                    <td><?php
                                                            switch ($key->driver_job) {
                                                                case 'mride':
                                                                    echo '<span class="label label-danger">Driver Ojek</span>';
                                                                    break;
                                                                case 'mcar':
                                                                    echo '<span class="label label-danger">Driver Taxi</span>';
                                                                    break;
                                                                case 'mmassage':
                                                                    echo '<span class="label label-danger">Success</span>';
                                                                    break;
                                                                case 'mbox':
                                                                    echo '<span class = "label label-success">Driver Truk</span>';
                                                                    break;
                                                                case 'mservice':
                                                                    echo '<span class = "label label-success">Canceled</span>';
                                                                    break;
                                                                default:
                                                                    break;
                                                            }
                                                            ?></td>
                                                    
                                                    <td><?php
                                            if ($tittle == 'E-Massage' || $tittle == 'E-Service') {
                                                echo '-';
                                            } else {
                                                echo $key->nomor_kendaraan;
                                            }
                                                ?></td>
                                                    <td><?php echo $key->no_telepon; ?></td>
                                                    <td><?php echo $key->email; ?></td>
                                                    <td><?php echo $key->saldo; ?></td>
                                                        
                                                    <td>
                                                        <!--aktif, non aktif, banned-->
                                                        <?php
                                                        if ($key->status_user == 'aktif') {
                                                            echo '<span class="label label-success">Aktif</span>';
                                                        } else if ($key->status_user == 'non aktif') {
                                                            echo '<span class="label label-info">Non Aktif</span>';
                                                        } else if ($key->status_user == 'banned') {
                                                            echo '<span class="label label-danger">Banned</span>';
                                                        }
                                                        ?>

                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>index.php/Listdriver/detilDriver/<?php echo $key->id; ?>"><button type="button" class="btn btn-default btn-xs">Detail</button></a>
                                                        <a href="<?php echo base_url(); ?>index.php/Listdriver/resetPassword/<?php echo $key->id; ?>/<?php echo $key->nama_depan ?>/<?php echo "$tittle"; ?>"><button type="button" class="btn btn-primary btn-xs" onclick="return confirm('Apakah anda yakin melakukan reset password kepada driver <?php echo $key->nama_depan . " " . $key->nama_belakang; ?> ?')">Reset Password</button></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
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
