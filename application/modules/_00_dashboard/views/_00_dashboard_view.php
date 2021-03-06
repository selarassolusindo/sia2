<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo SITE_NAME . ' v' . SITE_VERSION; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/summernote/summernote-bs4.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- pagination -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/pagination.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/select2/css/select2.min.css">

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/select2/js/select2.full.min.js"></script>

    </head>

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">

                <!-- Left navbar links -->
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <?php if ($this->session->userdata('user_id') != "") { ?>
                            <a class="dropdown-item text-xs" href="<?php echo site_url(); ?>auth/change_password">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-xs" href="<?php echo site_url(); ?>auth/logout">Logout</a>
                            <?php } else { ?>
                            <a class="dropdown-item text-xs" href="<?php echo site_url(); ?>auth/login">Login</a>
                            <?php }?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>

            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">

                <!-- Brand Logo -->
                <a href="<?php echo site_url(); ?>" class="brand-link">
                    <img src="<?php echo base_url(); ?>assets/adminlte/dist/img/AdminLTELogo.png"
                    alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                    <span class="brand-text font-weight-light"><?php echo SITE_NAME . ' v' . SITE_VERSION; ?></span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <!-- <div class="image">
                            <img src="<?php echo base_url(); ?>assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div> -->
                        <div class="info">
                            <!-- <a href="#" class="d-block">Alexander Pierce</a> -->
                            <a href="#" class="d-block"><?php echo $this->ion_auth->logged_in() ? $this->ion_auth->user()->row()->first_name . ' - ' . $this->ion_auth->user()->row()->username . ' - ' . $this->session->userdata('dbName') : ''; ?></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="<?php echo site_url(); ?>" class="nav-link <?php echo ($this->uri->segment(1) == '' ? 'active' : ''); ?>">
                                    <i class="far fa-window-maximize nav-icon"></i>
                                    <p>
                                    DASHBOARD
                                    </p>
                                </a>
                            </li>

                            <?php if ($this->ion_auth->logged_in()) { ?>

                            <!-- setup -->
                            <li class="nav-item has-treeview
                                <?php
                                switch ($this->uri->segment(1)) {
                                    case 'auth':
                                    case 't99_company':
                                    case 't98_akun':
                                    case 't97_saldoawal':
                                    case 't96_tglsa':
                                    case 't01_package':
                                    case 't02_top':
                                    case 't03_agent':
                                    case 't04_tos':
                                    case 't05_tos2':
                                    case 't06_currency':
                                        echo 'menu-open';
                                        break;
                                    default:
                                        echo '';
                                }
                                ?>
                            ">
                                <a href="#" class="nav-link
                                    <?php
                                    switch ($this->uri->segment(1)) {
                                        case 'auth':
                                        case 't99_company':
                                        case 't98_akun':
                                        case 't97_saldoawal':
                                        case 't96_tglsa':
                                        case 't01_package':
                                        case 't02_top':
                                        case 't03_agent':
                                        case 't04_tos':
                                        case 't05_tos2':
                                        case 't06_currency':
                                            echo 'active';
                                            break;
                                        default:
                                            echo '';
                                    }
                                    ?>
                                ">
                                    <i class="far fa-window-maximize nav-icon"></i>
                                    <p>
                                    SETUP
                                    <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php if ($this->ion_auth->is_admin()) { ?>

                                    <div class="dropdown-divider"></div>

                                    <!-- users & groups -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>auth" class="nav-link <?php echo $this->uri->segment(1) == 'auth' ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Users & Groups</p>
                                        </a>
                                    </li>

                                    <div class="dropdown-divider"></div>

                                    <!-- company -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>t99_company" class="nav-link <?php echo $this->uri->segment(1) == 't99_company' ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Perusahaan</p>
                                        </a>
                                    </li>

                                    <div class="dropdown-divider"></div>

                                    <!-- akun -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>t98_akun" class="nav-link <?php echo $this->uri->segment(1) == 't98_akun' ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Akun</p>
                                        </a>
                                    </li>
                                    <!-- tanggal saldo awal lalu saldo awal -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>t96_tglsa" class="nav-link <?php echo ($this->uri->segment(1) == 't96_tglsa' or $this->uri->segment(1) == 't97_saldoawal') ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Saldo Awal</p>
                                        </a>
                                    </li>

                                    <div class="dropdown-divider"></div>

                                    <!-- package -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>t01_package" class="nav-link <?php echo $this->uri->segment(1) == 't01_package' ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Package</p>
                                        </a>
                                    </li>

                                    <!-- mata uang -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>t06_currency" class="nav-link <?php echo $this->uri->segment(1) == 't06_currency' ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Mata Uang</p>
                                        </a>
                                    </li>

                                    <!-- jenis pembayaran -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>t02_top" class="nav-link <?php echo $this->uri->segment(1) == 't02_top' ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Jenis Pembayaran</p>
                                        </a>
                                    </li>

                                    <!-- jenis selisih PRICE-LIST-->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>t05_tos2" class="nav-link <?php echo $this->uri->segment(1) == 't05_tos2' ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Jenis Selisih PRICE-LIST</p>
                                        </a>
                                    </li>

                                    <!-- jenis selisih PRICE-TO-PAY-->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>t04_tos" class="nav-link <?php echo $this->uri->segment(1) == 't04_tos' ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Jenis Selisih PRICE-TO-PAY</p>
                                        </a>
                                    </li>

                                    <!-- agent -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>t03_agent" class="nav-link <?php echo $this->uri->segment(1) == 't03_agent' ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Agent</p>
                                        </a>
                                    </li>

                                    <div class="dropdown-divider"></div>

                                    <?php } ?>
                                </ul>
                            </li>

                            <!-- tamu -->
                            <li class="nav-item has-treeview
                                <?php
                                switch ($this->uri->segment(1)) {
                                    case 't30_tamu':
                                    case 't31_bayar':
                                    case 't32_bayard':
                                        echo 'menu-open';
                                        break;
                                    default:
                                        echo '';
                                }
                                ?>
                            ">
                                <a href="#" class="nav-link
                                    <?php
                                    switch ($this->uri->segment(1)) {
                                        case 't30_tamu':
                                        case 't31_bayar':
                                        case 't32_bayard':
                                            echo 'active';
                                            break;
                                        default:
                                            echo '';
                                    }
                                    ?>
                                ">
                                    <i class="far fa-window-maximize nav-icon"></i>
                                    <p>
                                    TAMU
                                    <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <div class="dropdown-divider"></div>

                                    <!-- input data -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>t30_tamu" class="nav-link <?php echo $this->uri->segment(1) == 't30_tamu' ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Input Data</p>
                                        </a>
                                    </li>

                                    <!-- pembayaran -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>t31_bayar" class="nav-link <?php echo ($this->uri->segment(1) == 't31_bayar' or $this->uri->segment(1) == 't32_bayard')  ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Pembayaran</p>
                                        </a>
                                    </li>

                                    <div class="dropdown-divider"></div>

                                </ul>
                            </li>

                            <!-- laporan -->
                            <li class="nav-item has-treeview
                                <?php
                                switch ($this->uri->segment(1)) {
                                    case 'v01_bukubesar':
                                        echo 'menu-open';
                                        break;
                                    default:
                                        echo '';
                                }
                                ?>
                            ">
                                <a href="#" class="nav-link
                                    <?php
                                    switch ($this->uri->segment(1)) {
                                        case 'v01_bukubesar':
                                            echo 'active';
                                            break;
                                        default:
                                            echo '';
                                    }
                                    ?>
                                ">
                                    <i class="far fa-window-maximize nav-icon"></i>
                                    <p>
                                    LAPORAN
                                    <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <div class="dropdown-divider"></div>

                                    <!-- buku besar -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url(); ?>v01_bukubesar" class="nav-link <?php echo $this->uri->segment(1) == 'v01_bukubesar' ? 'active' : ''; ?>">
                                            <i class="far fa-window-restore nav-icon"></i>
                                            <p>Buku Besar</p>
                                        </a>
                                    </li>

                                    <div class="dropdown-divider"></div>

                                </ul>
                            </li>

                            <?php } ?>

                            <!-- login or logout -->
                            <?php if ($this->session->userdata('user_id') != "") { ?>
                            <!-- logout -->
                            <li class="nav-item">
                                <a href="<?php echo site_url(); ?>auth/logout" class="nav-link">
                                    <i class="fas fa-sign-out-alt nav-icon"></i>
                                    <p>
                                    LOGOUT
                                    </p>
                                </a>
                            </li>
                            <?php } else { ?>
                            <!-- login -->
                            <li class="nav-item">
                                <a href="<?php echo site_url(); ?>auth/login" class="nav-link">
                                    <i class="fas fa-sign-in-alt nav-icon"></i>
                                    <p>
                                    LOGIN
                                    </p>
                                </a>
                            </li>
                            <?php } ?>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->

                </div>
                <!-- /.sidebar -->

            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h5 class="m-0 text-dark"><?php echo $_caption; ?></h5>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <?php
                                    $j = $this->uri->total_segments(); //echo $j;
                                    if ($j == 0) {
                                        ?>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Dashboard</a></li>
                                        <?php
                                        if ($j == 1) {
                                            ?>
                                            <li class="breadcrumb-item active">
                                                <?php //echo substr($this->uri->segment(1), 0, 1) == 't' ? ucfirst(substr($this->uri->segment(1), 4)) : ucfirst($this->uri->segment(1)); ?>
                                                <?php
                                                if (
                                                    substr($this->uri->segment(1), 0, 1) == 't'
                                                    or substr($this->uri->segment(1), 0, 1) == 'v'
                                                    ) {
                                                    switch (substr($this->uri->segment(1), 4)) {
                                                        case 'company':
                                                            echo 'Perusahaan';
                                                            break;
                                                        default:
                                                            echo ucfirst(substr($this->uri->segment(1), 4));
                                                    }
                                                } else {
                                                    echo ucfirst($this->uri->segment(1));
                                                }
                                                ?>
                                            </li>
                                            <?php
                                        } else {
                                            for ($i = 1; $i <= 2; $i++) {
                                                if ($i == 1) {
                                                    ?>
                                                    <li class="breadcrumb-item">
                                                        <a href="<?php echo site_url().$this->uri->segment(1); ?>">
                                                            <?php //echo substr($this->uri->segment(1), 0, 1) == 't' ? ucfirst(substr($this->uri->segment(1), 4)) : ucfirst($this->uri->segment(1)); ?>
                                                            <?php
                                                            if (substr($this->uri->segment(1), 0, 1) == 't'
                                                                or substr($this->uri->segment(1), 0, 1) == 'v'
                                                                ) {
                                                                switch (substr($this->uri->segment(1), 4)) {
                                                                    case 'company':
                                                                        echo 'Perusahaan';
                                                                        break;
                                                                    default:
                                                                        echo ucfirst(substr($this->uri->segment(1), 4));
                                                                }
                                                            } else {
                                                                echo ucfirst($this->uri->segment(1));
                                                            }
                                                            ?>
                                                        </a>
                                                    </li>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <li class="breadcrumb-item active">
                                                        <?php //echo ucfirst($this->uri->segment(2)); ?>
                                                        <?php
                                                        switch ($this->uri->segment(2)) {
                                                            case 'read':
                                                                echo 'Lihat';
                                                                break;
                                                            case 'create':
                                                                echo 'Tambah';
                                                                break;
                                                            case 'update':
                                                                echo 'Ubah';
                                                                break;
                                                        }
                                                        ?>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <?php $this->load->view($_view); ?>
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->

            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.0.5
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <!-- <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script> -->
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/moment/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/demo.js"></script>

        <script type="text/javascript">
            $(function () {
                $('body').addClass('text-sm'); //$('body').addClass('text-xs');
                $('a').addClass('text-sm'); //$('a').addClass('text-xs');
                $('.btn').addClass('btn-sm'); //$('.btn').addClass('btn-xs');
                $('.table').addClass('table-sm');
                $('.form-control').addClass('form-control-sm');
                $('.input-group').addClass('input-group-sm');
                $('.main-sidebar').removeClass('sidebar-dark-primary');
                $('.main-sidebar').addClass('sidebar-light-lightblue text-sm'); //$('.main-sidebar').addClass('sidebar-light-lightblue text-xs');
                $('.nav').addClass('nav-child-indent nav-compact');
            })
        </script>

    </body>

</html>
