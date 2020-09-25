<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WebAdmin - Banner Promosi Market</title>

        <!--Jquery AutoComplete-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                        Banner Promosi
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">

                        <div class="col-xs-8">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Banner Promosi Market</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>

                                </div>

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <?php echo $pesan; ?>
                                        <div class="col-md-12">

                                            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="border-style: solid;border-width: 3px;border-color: black;">
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                                    <li data-target="#myCarousel" data-slide-to="3"></li>
                                                </ol>

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="item active">
                                                        <div style="width: 700px; height: 134px;"></div>
  <!--<img src="#" style="width: 700px; height: 300px;" class="center-block">-->
                                                        <h2 class="text-center"> Pratinjau </h2>
                                                        <div style="width: 700px; height: 133px;"></div>
                                                    </div>

                                                    <?php
                                                    $no = 1;
                                                    foreach ($promosi as $val) {
                                                        ?>
                                                        <div class="item">
                                                            <img src="<?php echo base_url(); ?>fotopromosimlaundryhome/<?php echo $val->foto; ?>" style="width: 700px; height: 300px;" class="center-block">
                                                            <p class="text-center">
                                                                <?php
                                                                echo "($no)";
                                                                $no++;
                                                                ?>
                                                                <?php echo $val->foto; ?>
                                                            </p>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <!-- Left and right controls -->
                                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                    <span class="sr-only">Sebelumnya</span>
                                                </a>
                                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                    <span class="sr-only">Selanjutnya</span>
                                                </a>
                                            </div>

                                            <br><br>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Toko</th>
                                                        <th>Deskripsi</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                        <th>Hapus</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($promosi as $val) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php
                                                                echo $no;
                                                                $no++;
                                                                ?>
                                                            </td>
                                                            <td><?php echo $val->nama; ?></td>
                                                            <td><?php echo $val->keterangan; ?></td>
                                                            <td><?php
                                                            if ($val->is_show == 1) {
                                                                echo '<span class="label label-success">ON</span>';
                                                            } else {
                                                                echo '<span class="label label-danger">OFF</span>';
                                                            }
                                                                ?>
                                                            </td>

                                                            <td><?php
                                                            if ($val->is_show == 1) {
                                                                    ?>
                                                                    <a href="<?php echo base_url(); ?>index.php/Bannerlaundry/turnoff/<?php echo $val->id; ?>">
                                                                        <button type="button" class="btn btn-default btn-sm">
                                                                            Turn OFF
                                                                        </button>
                                                                    </a>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <a href="<?php echo base_url(); ?>index.php/Bannerlaundry/turnon/<?php echo $val->id; ?>">
                                                                        <button type="button" class="btn btn-default btn-sm">
                                                                            Turn ON
                                                                        </button>
                                                                    </a>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>

                                                            <td>                                                    
                                                                <a href="<?php echo base_url(); ?>index.php/bannerlaundryhome/hapusBannerMLaundryHome/<?php echo $val->id; ?>/<?php echo $val->foto; ?>">
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus Banner tersebut ?')">
                                                                        <span class="glyphicon glyphicon-remove"></span>
                                                                    </button>
                                                                </a>
                                                            </td>
                                                        </tr> 
                                                        <?php
                                                    }
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


                        <div class="col-xs-4">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Tambah Promosi Baru</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <!--box 2--> 
                                        <div class="col-md-12">
                                            <form role="form" action="<?php echo base_url(); ?>index.php/bannerlaundryhome/tambahBannerMLaundryhome" method="POST" enctype="multipart/form-data">
                                                <br><br><label>Tambah Promosi baru : </label>
                                                <input type="file" name="userfile"><br>

                                                <div class="ui-widget">
                                                    <label for="tags">Nama Toko: </label>
                                                    <input id="tags" class="form-control" name="namalaundry">
                                                </div><br>
                                                
                                                <label for="exampleTextarea">Deskripsi</label>
                                                <textarea name="keterangan" class="form-control" id="exampleTextarea" rows="3"></textarea>
                                                
                                                <br><br>
                                                <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                </section>
                <!-- /.content -->
                <!-- ./box-body -->

            </div>
            <!-- /.content-wrapper -->
                 <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                <strong>Copyright &copy; 2019 <a href="https://Go-Pickme.com/">Go-Pickme</a>.</strong> All rights
                reserved.
            </footer>
        </div>


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

    <!-- page script -->
    <script>  
        $( function() {
            var availableTags = [

                    
<?php
foreach ($restoran as $res) {
    echo "\"$res->nama\",";
}
?>
            ""
        ];
        $( "#tags" ).autocomplete({
            source: availableTags
        });
    } );
    </script>

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





</body>
</html>
