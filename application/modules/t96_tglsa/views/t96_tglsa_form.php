<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T96_tglsa <?php echo $button ?></h2> -->
    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group col-2">
            <!-- <label for="date">TglSA <?php echo form_error('TglSA') ?></label> -->
            <!-- <input type="text" class="form-control" name="TglSA" id="TglSA" placeholder="TglSA" value="<?php echo $TglSA; ?>" /> -->
            <!-- <label for="date">Tgl. Saldo Awal <?php echo form_error('TglSA') ?></label> -->
            <div class="input-group date" id="tglsa" data-target-input="nearest">
                <div class="input-group-append" data-target="#tglsa" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input placeholder="Tgl. Saldo Awal" type="text" name="TglSA" value="<?php echo $TglSA; ?>" class="form-control datetimepicker-input" data-target="#tglsa"/>
            </div>
        </div>
	    <input type="hidden" name="idtglsa" value="<?php echo $idtglsa; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('t96_tglsa') ?>" class="btn btn-secondary">Batal</a>
	</form>

    <script>
        $(document).ready(function () {
            //Date range picker
            $('#tglsa').datetimepicker({
                format: 'DD-MM-YYYY'
            });
        })
        // $(function () {
        //     //Date range picker
        //     $('#reservationdate').datetimepicker({
        //         format: 'DD-MM-YYYY'
        //     })
        // })
    </script>
    <!-- </body>
</html> -->
