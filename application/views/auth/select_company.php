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
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo site_url(); ?>"><?php echo '<b>' . SITE_NAME . '</b> v' . SITE_VERSION; ?></a>
            </div>
            <!-- /.login-logo -->

            <div class="card">

                <div class="card-body login-card-body">

                    <p class="login-box-msg"><?php echo 'Select Company';?></p>
                    <p class="login-box-msg"><?php echo $message;?></p>

                    <?php echo form_open("auth/selectCompany");?>

                        <div class="input-group mb-3">
                            <select class="form-control" name="idcompany">
                                <option>Company</option>
                                <?php foreach ($groups as $r) { ?>
                                    <?php if (substr($r->description, 0, 2) == 'PT' or substr($r->description, 0, 2) == 'CV') { ?>
                                    <option value="<?php echo $r->name; ?>"><?php echo $r->description; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-building"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <?php echo form_submit('submit', lang('login_submit_btn'), array('class'=>'btn btn-primary'));?>
                                <a href="<?php echo site_url('auth/logout'); ?>" type="button" class="btn btn-secondary">Cancel</a>
                            </div>
                            <!-- /.col -->

                        </div>

                    <?php echo form_close();?>

                    <div class="social-auth-links text-center mb-3">

                    </div>
                    <!-- /.social-auth-links -->

                </div>
                <!-- /.login-card-body -->

            </div>

        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.min.js"></script>

        <script type="text/javascript">
            $(function () {
                $('.btn').addClass('btn-sm');
                $('.table').addClass('table-sm');
                $('.form-control').addClass('form-control-sm');
                $('.input-group').addClass('input-group-sm');
                $('body').addClass('text-xs');
                $('.main-header').addClass('text-xs');
                $('.main-sidebar').removeClass('sidebar-dark-primary');
                $('.main-sidebar').addClass('sidebar-light-lightblue text-xs');
                $('.nav').addClass('nav-child-indent nav-compact');
            })
        </script>

    </body>
</html>
