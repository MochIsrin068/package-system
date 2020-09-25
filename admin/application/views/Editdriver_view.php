<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WebAdmin - Edit Status Driver</title>
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
                        Edit Driver Status
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Informasi Detail Pengemudi</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>

                                </div>
                                <!-- form start -->
                                <form action="<?php echo base_url(); ?>index.php/Listdriver/editStatus" method="POST" role="form" enctype="multipart/form-data">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-4">
                                                <br><br><br>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Driver ID</label>
                                                        <input name="iddriver" type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['id']; ?>">
                                                        <input name="idkendaraan" type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['idkendaraan']; ?>">
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['id']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Nama Awal</label>
                                                        <input name="namadepan" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['nama_depan']; ?>">
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Nama Belakang</label>
                                                        <input name="namabelakang" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['nama_belakang']; ?>">
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">No KTP</label>
                                                        <input name="ktp" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['no_ktp']; ?>">
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Tempat Lahir</label>
                                                        <input name="tempatlahir" type="text" class="form-control" placeholder="" value="<?php echo $driver[0]['tempat_lahir']; ?>">
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Tanggal Lahir (MM/dd/yyyy)</label>
                                                        <input name="DOB" class="form-control" type="date" data-date="" data-date-format="DD MMMM YYYY" value="<?php echo $driver[0]['tgl_lahir']; ?>">
                                                        <!--<input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['tgl_lahir']; ?>" disabled>-->
                                                    </div>
                                                </div>


                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">No Hp</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['no_telepon']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Pekerjaan</label>
                                                        <input type="hidden" name="job" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['driver_job']; ?>">
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['driver_job']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select name="status" class="form-control" id="sel1">
                                                            <option value="1">Aktif</option>
                                                            <option value="2">Tidak-Aktif</option>
                                                            <option value="3">Banned</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <div class="col-md-4">
                                                <!--style="width: 100%; height: 100%; border: 3px; border-color: white;"-->
                                                <img src="<?php echo base_url() . "fotodriver/" . $driver[0]['foto'] ?>" class="img-responsive img-thumbnail" alt="Cinque Terre">

                                                <br>
                                                <div class="box-body">
                                                    <div class="form-group"><br>
                                                        <label for="">Perbarui Foto</label>
                                                        <input name="foto" type="hidden" value="<?php echo $driver[0]['foto']; ?>">
                                                        <input type="file" name="userfile" accept=".png, .jpg, .jpeg, .gif">
                                                    </div>
                                                </div>

                                                <h4 class="text-center">Data Kendaraan</h4>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Jenis Kendaraan</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['jenis_kendaraan']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Merek Kendaraan</label>
                                                        <input name="merekkendaraan" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['merek']; ?>">
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Tipe Kendaraan</label>
                                                        <input name="tipekendaraan" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['tipe']; ?>">
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">No Kendaraan </label>
                                                        <input name="nokendaraan" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['nomor_kendaraan']; ?>">
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Warna</label>
                                                        <input name="warnakendaraan" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="<?php echo $driver[0]['warna']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary">Perbarui</button>
                                        </div>
                                </form>
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

