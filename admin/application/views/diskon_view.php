<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WebAdmin - Diskon</title>
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
                    Management Paket Diskon
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
                                <h4 class="modal-title">Buat Paket Diskon</h4>
                            </div>
                            <div class="modal-body">
                                <!-- left column -->
                                <!-- general form elements -->
                                <div class="box">
                                    <!-- form start -->
                                    <form role="form" method="POST" enctype="multipart/form-data" action="diskon/add">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="harga">Nama Paket</label>
                                                <select required name="paket_id" class="form-control" id="estimasi">
                                                    <option value="NULL">-- Pilih Paket --</option>
                                                    <?php foreach ($pakets as $paket) { ?>
                                                        <option value="<?php echo $paket->id ?>">
                                                            <?php
                                                            echo $paket->nama . " ( " . $paket->id . " )";
                                                            ?>
                                                        </option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Nama Diskon</label>
                                                <input type="text" required class="form-control" name="nama_diskon" id="nama" placeholder="Nama Diskon">
                                            </div>
                                            <div class="form-group">
                                                <label for="diskon">Diskon ( % )</label>
                                                <input type="number" required class="form-control" name="diskon_paket" id="diskon" placeholder="Diskon Paket">
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
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">Tambah Paket Diskon</button>

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
                                        <th>Nama Diskon</th>
                                        <th>Diskon</th>
                                        <th>#</th>
                                    </tr>

                                    <?php
                                    $no = 1;
                                    ?>

                                    <?php
                                    foreach ($diskons as $diskon) {
                                    ?>

                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td>
                                                <?php
                                                foreach ($pakets as $paket) {
                                                    if ($paket->id === $diskon->paket_id) {
                                                        echo $paket->nama . " ( " . $paket->id . " )";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $diskon->nama; ?></td>
                                            <td><?php echo $diskon->discount . " %"; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning btn-flat">Action</button>
                                                    <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <!-- <li><a href="#">Detail</a></li> -->
                                                        <li><a href="" data-toggle="modal" data-target="#modal-edit<?php echo $diskon->id ?>">Edit</a></li>
                                                        <li><a href="" data-toggle="modal" data-target="#modal-delete<?php echo $diskon->id ?>">Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="modal-delete<?php echo $diskon->id ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Delete Data</h4>
                                                    </div>
                                                    <form role="form" method="POST" enctype="multipart/form-data" action="diskon/delete">
                                                        <div class="modal-body">
                                                            <div class="alert alert-warning alert-dismissible">
                                                                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                                                                Are you sure delete <?php echo $diskon->nama . " ?" ?>
                                                            </div>
                                                            <input name="id" type="hidden" value="<?php echo $diskon->id ?>" />
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
                                        <div class="modal fade" id="modal-edit<?php echo $diskon->id ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Edit Paket Diskon</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- left column -->
                                                        <!-- general form elements -->
                                                        <div class="box">
                                                            <!-- form start -->
                                                            <form role="form" method="POST" enctype="multipart/form-data" action="diskon/update">
                                                                <div class="box-body">
                                                                    <input type="hidden" name="id" id="id" value="<?php echo $diskon->id; ?>">
                                                                    <div class="form-group">
                                                                        <label for="harga">Nama Paket</label>
                                                                        <select value="<?php echo $diskon->paket_id; ?>" name="paket_id" class="form-control" id="estimasi">

                                                                            <?php foreach ($pakets as $paket) {
                                                                                if (intval($paket->id) === intval($diskon->paket_id)) { ?>
                                                                                    <option value="<?php echo $paket->id ?>" selected>
                                                                                        <?php
                                                                                        echo $paket->nama . " ( " . $paket->id . " )";
                                                                                        ?>
                                                                                    </option>
                                                                                <?php } else { ?>
                                                                                    <option value="<?php echo $paket->id ?>">
                                                                                        <?php
                                                                                        echo $paket->nama . " ( " . $paket->id . " )";
                                                                                        ?>
                                                                                    </option>
                                                                                <?php } ?>
                                                                            <?php } ?>

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama">Nama Diskon</label>
                                                                        <input type="text" value="<?php echo $diskon->nama; ?>" class="form-control" name="nama_diskon" id="nama" placeholder="Nama Diskon">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="diskon">Diskon ( % )</label>
                                                                        <input type="number" value="<?php echo $diskon->discount; ?>" class="form-control" name="diskon_paket" id="diskon" placeholder="Diskon Paket">
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