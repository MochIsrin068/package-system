<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WebAdmin - Driver Topup</title>
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
                        Driver Topup 
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Daftar Permintaan Top-Up Driver</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <?php // var_dump($detailtopup); ?>

                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <table class="table table-striped">
                                                <h4 class="text-center">Detail Driver</h4>
                                                <tr>
                                                    <td><b>Nama Driver </b></td>
                                                    <td><p class="text-left">: <?php echo $detailtopup[0]['nama_depan'] . " " . $detailtopup[0]['nama_belakang']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat Email </b></td>
                                                    <td><p class="text-left">: <?php echo $detailtopup[0]['email']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. Telepon </b></td>
                                                    <td><p class="text-left">: <?php echo $detailtopup[0]['no_telepon']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. KTP </b></td>
                                                    <td><p class="text-left">: <?php echo $detailtopup[0]['no_ktp']; ?></p></td>
                                                </tr>
                                            </table>

                                            <br>
                                            <h4 class="text-center">Detail Pemintaan</h4>

                                            <table class="table table-striped">  
                                                <tr>
                                                    <td><b>Waktu Top-Up</b></td>
                                                    <td><p class="text-left">: <?php echo $detailtopup[0]['waktu']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. Rek</b></td>
                                                    <td><p class="text-left">: <?php echo $detailtopup[0]['no_rekening']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Bank </b></td>
                                                    <td><p class="text-left">: <?php echo $detailtopup[0]['bank']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Pengirim</b></td>
                                                    <td><p class="text-left">: <?php echo $detailtopup[0]['atas_nama']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Jumlah Permintaan</b></td>
                                                    <td><p class="text-left">: <?php echo $detailtopup[0]['jumlah']; ?></p></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/asset/berkas_topup/driver/" . $detailtopup[0]['bukti']; ?>">
                                                <img src="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/asset/berkas_topup/driver/" . $detailtopup[0]['bukti']; ?>" class="img-responsive img-thumbnail" alt="Cinque Terre">
                                            </a>

                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="row">
                                        <br><br><br>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <?php // var_dump($detailtopup)?>
                                            <a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/drivertopup/validasiTopup/<?php echo $detailtopup[0]['nomor']; ?>/<?php echo $detailtopup[0]['id_user']; ?>" role="button" onclick="return confirm('Apakah anda yakin melakukan varifikasi kepada Topup tersebut ?')">Verifikasi Topup</a>
                                            <a href="<?php echo base_url(); ?>index.php/drivertopup/batalTopup/<?php echo $detailtopup[0]['nomor']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin mengagalkan top up tersebut ?')"><span class="glyphicon glyphicon-remove"></span></button></a>
                                        </div>

                                    </div><br>

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
