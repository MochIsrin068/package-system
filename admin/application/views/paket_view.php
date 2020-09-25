<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WebAdmin - Paket</title>
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
    <!-- Content Wrapper. Contains page content -->
    <div class="wrapper">
        <!--HEADER dan SIDEBAR include-->
        <?php include 'SIDEBAR.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Management Paket Sewa
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- MODAL CREATE HERE -->
                <div class="modal fade" id="modal-create">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Buat Paket</h4>
                            </div>
                            <div class="modal-body">
                                <!-- left column -->
                                <!-- general form elements -->
                                <div class="box">
                                    <!-- form start -->
                                    <form role="form" method="POST" enctype="multipart/form-data" action="paket/add">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="nama">Nama Paket</label>
                                                <input type="text" required class="form-control" name="nama_paket" id="nama" placeholder="Nama Paket">
                                            </div>
                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input type="number" required class="form-control" name="harga_paket" id="harga" placeholder="Harga Paket">
                                            </div>
                                            <div class="form-group">
                                                <label>Kategori Estimasi</label>
                                                <div class="row" style="display: flex; align-items: center;">
                                                    <div class="form-group col-xs-5">
                                                        <select required name="estimasi_paket" class="form-control" onchange="changeEstimate()" id="estimasi">
                                                            <option value="NULL">-- Pilih Estimasi --</option>
                                                            <option value="1">Setengah Hari ( 12 Jam )</option>
                                                            <option value="2">Harian</option>
                                                            <option value="3">Mingguan</option>
                                                            <option value="4">Bulanan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-xs-5">
                                                        <input type="number" required name="extimate" class="form-control" id="extimate" placeholder="Jumlah">
                                                    </div>
                                                    <label id="countEstimate"></label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <!-- /.box -->
                                <!-- </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                            <?php //echo form_close();  
                            ?>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <!-- /.row -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <!-- <h3 class="box-title">Paket Sewa</h3> -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">Tambah Paket</button>

                                <div class="box-tools">
                                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Expired Date</th>
                                        <th>#</th>
                                    </tr>

                                    <?php
                                    $no = 1;
                                    ?>

                                    <?php
                                    foreach ($pakets as $paket) {
                                    ?>

                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $paket->nama; ?></td>
                                            <td><?php echo $paket->harga; ?></td>
                                            <td>
                                                <!-- <span class="label label-success">Approved</span> -->
                                                <?php
                                                $now = date("Y-m-d H:i:s");
                                                $diff_min = (strtotime($paket->expired) - strtotime($now)) / 60 / 60;
                                                $total_time  = $diff_min;
                                                if ($total_time > 0) {
                                                ?>
                                                    <span class="label label-success">Belum Expire</span>
                                                <?php
                                                } else { ?>
                                                    <span class="label label-danger">Sudah Expire</span>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $paket->expired; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning btn-flat">Action</button>
                                                    <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <!-- <li><a href="#">Detail</a></li> -->
                                                        <?php
                                                        $now = date("Y-m-d H:i:s");
                                                        $diff_min = (strtotime($paket->expired) - strtotime($now)) / 60 / 60;
                                                        $total_time  = $diff_min;
                                                        if ($total_time > 0) {
                                                        ?>
                                                            <li><a href="" data-toggle="modal" data-target="#modal-edit<?php echo $paket->id ?>">Edit</a></li>
                                                            <li><a href="" data-toggle="modal" data-target="#modal-delete<?php echo $paket->id ?>">Delete</a></li>
                                                        <?php
                                                        } else { ?>
                                                            <li><a href="" data-toggle="modal" data-target="#modal-delete<?php echo $paket->id ?>">Delete</a></li>
                                                        <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="modal-delete<?php echo $paket->id ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Delete Data</h4>
                                                    </div>
                                                    <form role="form" method="POST" enctype="multipart/form-data" action="paket/delete">
                                                        <div class="modal-body">
                                                            <div class="alert alert-warning alert-dismissible">
                                                                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                                                Are you sure delete <?php echo $paket->nama . " ?" ?>
                                                            </div>
                                                            <input name="id" type="hidden" value="<?php echo $paket->id ?>" />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-primary">Yes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->

                                        <!-- MODAL Edit HERE -->
                                        <div class="modal fade" id="modal-edit<?php echo $paket->id ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Edit Paket</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- left column -->
                                                        <!-- general form elements -->
                                                        <div class="box">
                                                            <!-- form start -->
                                                            <form role="form" method="POST" enctype="multipart/form-data" action="paket/update">
                                                                <div class="box-body">
                                                                    <input type="hidden" name="id" id="id" value="<?php echo $paket->id; ?>">
                                                                    <div class="form-group">
                                                                        <label for="nama">Nama Paket</label>
                                                                        <input type="text" value="<?php echo $paket->nama; ?>" class="form-control" name="nama_paket" id="nama" placeholder="Nama Paket">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="harga">Harga</label>
                                                                        <input type="number" value="<?php echo $paket->harga; ?>" class="form-control" name="harga_paket" id="harga" placeholder="Harga Paket">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Kategori Estimasi</label>
                                                                        <div class="row" style="display: flex; align-items: center;">
                                                                            <div class="form-group col-xs-5">
                                                                                <select value="<?php echo $paket->kategori_estimasi; ?>" name="estimasi_paket" class="form-control" onchange="changeEstimate()" id="estimasi">
                                                                                    <?php
                                                                                    if ($paket->kategori_estimasi === "1") { ?>
                                                                                        <option value="1" selected>Setengah Hari ( 12 Jam )</option>
                                                                                        <option value="2">Harian</option>
                                                                                        <option value="3">Mingguan</option>
                                                                                        <option value="4">Bulanan</option>
                                                                                    <?php } else if ($paket->kategori_estimasi === "2") { ?>
                                                                                        <option value="1">Setengah Hari ( 12 Jam )</option>
                                                                                        <option value="2" selected>Harian</option>
                                                                                        <option value="3">Mingguan</option>
                                                                                        <option value="4">Bulanan</option>
                                                                                    <?php } else if ($paket->kategori_estimasi === "3") { ?>
                                                                                        <option value="1">Setengah Hari ( 12 Jam )</option>
                                                                                        <option value="2">Harian</option>
                                                                                        <option value="3" selected>Mingguan</option>
                                                                                        <option value="4">Bulanan</option>
                                                                                    <?php } else { ?>
                                                                                        <option value="1">Setengah Hari ( 12 Jam )</option>
                                                                                        <option value="2">Harian</option>
                                                                                        <option value="3">Mingguan</option>
                                                                                        <option value="4" selected>Bulanan</option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-xs-5">
                                                                                <input type="number" name="extimate" class="form-control" id="extimate" value="<?php echo $paket->jam_estimasi; ?>" placeholder="Jumlah">
                                                                            </div>
                                                                            <label id="countEstimateEdit">
                                                                                <?php
                                                                                if ($paket->kategori_estimasi === "1") {
                                                                                    echo "/ Jam";
                                                                                } else if ($paket->kategori_estimasi === "2") {
                                                                                    echo "/ Hari";
                                                                                } else if ($paket->kategori_estimasi === "3") {
                                                                                    echo "/ Minggu";
                                                                                } else {
                                                                                    echo "/ Bulan";
                                                                                }
                                                                                ?>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <!-- /.box -->
                                                        <!-- </div> -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                    </form>
                                                    <?php //echo form_close();  
                                                    ?>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->

                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </table>
                            </div>
                            <!-- /.box-body -->
                            <!-- <div class="box-footer clearfix">
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    <li><a href="#">&laquo;</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul>
                            </div> -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- CUSTOM JS -->
    <script>
        function changeEstimate() {
            var x = document.getElementById("estimasi").value;
            var newValue = x === "1" ? "Jam" : x === "2" ? "Hari" : x === "3" ? "Minggu" : x === "4" ? "Bulan" : " "
            document.getElementById("countEstimate").innerHTML = "/ " + newValue;
            document.getElementById("countEstimateEdit").innerHTML = "/ " + newValue;
        }
    </script>

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
</body>

</html>