<?php $role = $this->session->userdata('role'); ?>
<header class="main-header">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Logo -->
    <a href="#" class="logo">
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>WEB</b>-Admin</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Control Sidebar Toggle Button -->


                <!-- <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>
                    inner menu: contains the actual data
                    <ul class="menu">
                    <li>
                    <a href="#">
                    <i class="ion ion-ios-people info"></i> Notification title
                    </a>
                    </li>
                    ...
                    </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li> -->
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>../asset/img/favicon.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $this->session->userdata('email'); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url(); ?>../asset/img/favicon.png" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $this->session->userdata('email'); ?>
                                <small><?php echo $this->session->userdata('role_name'); ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <div class="pull-left">
                                    <a href="<?php echo base_url(); ?>index.php/manageadmin" class="btn btn-default btn-flat">Profile</a>
                                </div>

                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url(); ?>index.php/signout"><b style="margin-right: 10px">Keluar</b> <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>

                </li>
                <li>

                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" style="height: 45px">
                <img src="<?php echo base_url(); ?>../asset/img/favicon.png" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('email'); ?></p>
                <a href="#"><?php echo $this->session->userdata('role_name'); ?> </a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <!--MAIN NAVIGATION====================================================================-->
            <li class="header"> MAIN NAVIGATION</li>

            <?php if ($role == 1 or $role == 2) {    ?>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/dashboard">
                        <i class="active fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-plus"></i>
                        <span class="label label-warning"></span>
                        <span>Verifikasi Driver</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url(); ?>index.php/validatedriver/driverMotor"><i class="fa fa-motorcycle">


                                </i> OJEK</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/validatedriver/mcar"><i class="fa fa-car"></i> TAXI</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/validatedriver/mbox"><i class="fa fa-truck"></i> PICK-UP</a></li>
                        <!--                    @todo: validasi driver-->
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-group"></i>
                        <span>Verifikasi Mitra</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url(); ?>index.php/validatedriver/mlaundry"><i class="fa fa-cart-arrow-down"></i> TOKO</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/validatedriver/mfood"><i class="fa fa-cutlery"></i> RESTAURANT</a></li>
                        <!--                    @todo: validasi driver-->
                    </ul>
                </li>
            <?php } ?>
            <?php if ($role == 1 or $role == 2 or $role == 3) {    ?>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/Listpelanggan">
                        <i class="active fa fa-child"></i> <span>List Pelanggan</span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($role == 1 or $role == 2) {    ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-motorcycle"></i>
                        <span>List Driver</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <!--                     @todo: jenis driver -->
                        <li><a href="<?php echo base_url(); ?>index.php/listdriver/driverMotor"><i class="fa fa-motorcycle"></i> OJEK</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/listdriver/mcar"><i class="fa fa-car"></i> TAXI</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/MapDriver">
                        <i class="active fa fa-map"></i> <span> Map VIEW</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="active fa fa-paper-plane"></i>
                        <span>Banner Promosi</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/promotion">
                                <i class="active fa fa-paper-plane"></i> <span>Home banner</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Bannerlaundry">
                                <i class="active fa fa-cart-arrow-down"></i> <span> TOKO</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Bannermfood">
                                <i class="active fa fa-cutlery"></i> <span> FOOD</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Bannerlaundryhome">
                                <i class="active fa fa-cutlery"></i> <span> Market Home</span>
                            </a>
                        </li>

                    </ul>
                </li>
            <?php } ?>
            <?php if ($role == 1 or $role == 2 or $role == 3 or $role == 4) {    ?>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/vouchers">
                        <i class="active fa fa-gift"></i> <span> Voucher</span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($role == 1 or $role == 2 or $role == 4) {    ?>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/Dashboard/allTransaction">
                        <i class="active fa fa-list"></i> <span> Transaksi</span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($role == 1) {    ?>
                <li class="treeview">
                    <a href="#">
                        <i class="active fa fa-gears"></i>
                        <span>Konfigurasi</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/config">
                                <i class="active fa fa-paper-plane"></i> <span>Dasar</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/config/admin">
                                <i class="active fa fa-paper-plane"></i> <span>Admin</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/config/company_bank">
                                <i class="active fa fa-paper-plane"></i> <span>Bank Perusahaan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/config/customer_cancel_reason">
                                <i class="active fa fa-paper-plane"></i> <span> Alasan Pembatalan Pelanggan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/config/driver_reward">
                                <i class="active fa fa-cart-arrow-down"></i> <span> Driver Bonus</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            <?php if ($role == 1 or $role == 2) {    ?>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/helpcenter">
                        <i class="active fa fa-question-circle"></i> <span> BANTUAN</span>
                    </a>
                </li>
            <?php } ?>
            <!--
                <li class="header">Course Management</li>
                <li class="treeview">
                <a href="#">
                <i class="fa fa-graduation-cap"></i> 
                <span>Tecahcer</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                
                <li><a href="<?php echo base_url(); ?>index.php/listdriver/mmassage"><i class="fa fa-graduation-cap"></i>List Teacher</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/validatedriver/mmassage"><i class="fa fa-graduation-cap"></i>Approve Teacher</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/setcost/mmassage/pijat"><i class="fa fa-graduation-cap"></i>Fare Teacher</a></li>
                @todo: validasi driver
                </ul>
            </li>-->
            <?php if ($role == 1 or $role == 2) {    ?>
                <li class="header"> MANAGE PICK-UP</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-truck"></i>
                        <span> PICK-UP</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <!--                    @todo: set price-->
                        <li><a href="<?php echo base_url(); ?>index.php/Rental/driverRental"><i class="fa fa-group"></i> DRIVER PICK-UP</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/Rental/editfoto/Cargo"><i class="fa fa-camera"></i> ICON PICK-UP</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/Rental/mbox/Cargo"><i class="fa fa-money"></i> TARIF PICK-UP</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/Rental/transaksi"><i class="fa fa-money"></i>Transkasi</a></li>
                    </ul>
                </li>

                <!--MITRA MFOOD ========================================================================================================================-->
                <li class="header">Manage Mitra</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cutlery"></i>
                        <span>Manage Resto</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/listmitra/food">
                                <i class="active fa fa-cutlery"></i> <span>Restauran</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/listmitra/transaksifood">
                                <i class="active fa fa-money"></i><span>Transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/listmitra/makanan">
                                <i class="active fa fa-tags"></i><span>Makanan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cart-arrow-down"></i>
                        <span>Manage Toko</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li>
                            <a href="<?php echo base_url(); ?>index.php/listmitra/laundry">
                                <i class="active fa fa-cart-arrow-down"></i> <span>Toko</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/listmitra/item_produk">
                                <i class="active fa fa-tags"></i><span>Item Produk</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/listmitra/transaksi_item">
                                <i class="active fa fa-money"></i><span>Transaksi</span>
                            </a>
                        </li>
                    </ul>
                </li>

            <?php } ?>
            <!--KEUANGAN ========================================================================================================================-->
            <li class="header">FINANCE</li>
            <?php if ($role == 1 or $role == 2 or $role == 4) {    ?>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/Withdraw">
                        <i class="active fa fa-share-square-o"></i> <span>Penarikan Dana Driver</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url(); ?>index.php/WithdrawPoin">
                        <i class="active fa fa-share-square-o"></i> <span>Konversi Poin </span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($role == 1 or $role == 3 or $role == 4) {    ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-group"></i>
                        <span>Transaksi Manual</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($role == 1 or $role == 3 or $role == 4) {    ?>
                            <li><a href="<?php echo base_url(); ?>index.php/Manualtransaction/pelanggan"><i class="fa  fa-child"></i>Pelanggan</a></li>
                        <?php } ?>
                        <?php if ($role == 1 or $role == 4) {    ?>
                            <li><a href="<?php echo base_url(); ?>index.php/Manualtransaction/driver"><i class="fa fa-motorcycle"></i>Driver</a></li>
                        <?php } ?>
                        <!--                    @todo: manual transaksi-->
                        <!--                    <li><a href="#"><i class="fa fa-circle-o"></i> Pemijat</a></li>-->
                        <!--                    <li><a href="#"><i class="fa fa-circle-o"></i> Tekhnisi Service</a></li>-->
                    </ul>
                </li>
                <?php if ($role == 1 or $role == 4) {    ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cc-paypal "></i>
                            <span>Dompet</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>index.php/usertopup"><i class="fa  fa-child"></i>Top-Up Pelanggan</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/drivertopup"><i class="fa fa-motorcycle"></i>Driver TopUp</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/topup/topup">
                            <i class="active fa fa-motorcycle"></i> <span>Topup </span>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if ($role == 1) {    ?>
                <li class="treeview">
                    <a href="#">
                        <i class="active fa fa-money"></i>
                        <span>Tarif</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="<?php echo base_url(); ?>index.php/setcost/mride/ojek-online"><i class="fa fa-motorcycle"></i> OJEK</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/setcost/mcar/E-Car"><i class="fa fa-car"></i> TAXI</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/setcost/mfood/E-Food"><i class="active fa fa-cutlery"></i></i> RESTO</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/setcost/mlaundry/E-laundry"> <i class="active fa fa-cart-arrow-down"></i> TOKO</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/setcost/msend/E-send"> <i class="active fa fa-archive"></i> KURIR</a></li>
                    </ul>
                </li>
            <?php }  ?>
            <?php if ($role == 1 or $role == 3) {    ?>
                <li class="header">PPOB</li>
                <li class="treeview">
                    <a href="#">
                        <i class="active fa fa-money"></i>
                        <span>Data</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <!--                    @todo: set price-->
                        <li><a href="<?php echo base_url(); ?>index.php/ppob/purchase_category"><i class="active fa fa-share-square-o"></i> <span>Kategori Pembelian</span></a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/ppob/payment_category"><i class="active fa fa-share-square-o"></i> <span>Kategori Pembayaran</span></a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/ppob/purchase_operator"><i class="active fa fa-share-square-o"></i> <span>Operator Pembelian</span></a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/ppob/payment_operator"><i class="active fa fa-share-square-o"></i> <span>Operator Pembayaran</span></a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/ppob/purchase_product"><i class="active fa fa-share-square-o"></i> <span>Produk Pembelian</span></a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/ppob/payment_product"><i class="active fa fa-share-square-o"></i> <span>Produk Pembayaran</span></a></li>

                    </ul>
                </li>
                <li><a href="<?php echo base_url(); ?>index.php/ppob/topup"><i class="active fa fa-share-square-o"></i> <span>Topup</span></a></li>
                <li><a href="<?php echo base_url(); ?>index.php/ppob/transaction"><i class="active fa fa-share-square-o"></i> <span>Transaksi</span></a></li>

            <?php } ?>

            <!-- MANAGE PAKET -->
            <li class="header">Manage Paket</li>
            <li><a href="<?php echo base_url(); ?>index.php/paket/paket"><i class="active fa fa-cube"></i> <span>Paket Sewa</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/paket/diskon"><i class="active fa fa-cube"></i> <span>Diskon Paket Sewa</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/paket/riwayat"><i class="active fa fa-money"></i> <span>Riwayat Pembelian</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<script src="<?php echo base_url(); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.8.3/firebase.js"></script>
<script>
    // Initialize Firebase
    /*Update this config*/
    var config = {
        apiKey: <?php echo '"' . $this->config->item('firebase_apikey') . '"'; ?>,
        authDomain: <?php echo '"' . $this->config->item('firebase_authdomain') . '"'; ?>,
        databaseURL: <?php echo '"' . $this->config->item('firebase_databaseurl') . '"'; ?>,
        projectId: <?php echo '"' . $this->config->item('firebase_projectid') . '"'; ?>,
        storageBucket: <?php echo '"' . $this->config->item('firebase_storagebucket') . '"'; ?>,
        messagingSenderId: <?php echo '"' . $this->config->item('firebase_messagingsenderid') . '"'; ?>,
        appId: <?php echo '"' . $this->config->item('firebase_appid') . '"'; ?>

    };
    firebase.initializeApp(config);
    getAdminNotificationStatus();
    // Retrieve Firebase Messaging object.
    const messaging = firebase.messaging();
    messaging.requestPermission()
        .then(function() {
            console.log('Notification permission granted.');
            // TODO(developer): Retrieve an Instance ID token for use with FCM.
            if (isTokenSentToServer()) {
                console.log('Token already saved.');
            } else {
                getRegToken();
            }
        })
        .catch(function(err) {
            console.log('Unable to get permission to notify.', err);
        });

    function getRegToken(argument) {
        messaging.getToken()
            .then(function(currentToken) {
                if (currentToken) {
                    //saveToken(currentToken);
                    var token = currentToken;
                    var device_id = '<?php echo md5($_SERVER['HTTP_USER_AGENT']); ?>';
                    console.log(token, device_id);
                    saveToken(token, device_id);
                } else {
                    console.log('No Instance ID token available. Request permission to generate one.');
                    //setTokenSentToServer(false);
                }
            })
            .catch(function(err) {
                console.log('An error occurred while retrieving token. ', err);
                //  setTokenSentToServer(false);
            });
    }

    function setTokenSentToServer(token, device_id) {
        window.localStorage.setItem('sentToServer', sent ? 1 : 0);
    }

    function isTokenSentToServer() {
        return window.localStorage.getItem('sentToServer') == 1;
    }

    function saveToken(currentToken, deviceid) {
        $.ajax({
            url: <?php echo '"' . base_url() . 'FirebaseNotification/saveAdminToken/' . $this->session->userdata('id') . '/"'; ?> + currentToken,
            method: 'get',
        }).done(function(result) {
            console.log(result);
        })
    }

    function getAdminNotificationStatus() {
        $.ajax({
            url: <?php echo '"' . base_url() . 'FirebaseNotification/getAdminNotification/' . $this->session->userdata('id') . '/"'; ?>,
            method: 'get',
            dataType: 'json',
        }).done(function(result) {
            console.log(result);
            if (result.size > 0) {
                if (result.size > 99)
                    $('#badge-notification').html('99+');
                else
                    $('#badge-notification').html(result.size);
                $('#badge-notification').css('visibility', 'visible');
            } else
                $('#badge-notification').css('visibility', 'hidden');
        })
    }
    messaging.onMessage(function(payload) {
        console.log("Message received. ", payload);
        var notificationTitle = payload.data.title;
        const notificationOptions = {
            body: payload.data.body,
            icon: payload.data.icon,
            image: payload.data.image,
            click_action: payload.data.link_action, // To handle notification click when notification is moved to notification tray
            data: {
                click_action: payload.data.link_action
            }
        };
        getAdminNotificationStatus();
        var notification = new Notification(notificationTitle, notificationOptions);
    });
</script>