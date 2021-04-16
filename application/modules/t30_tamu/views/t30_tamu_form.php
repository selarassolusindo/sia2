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
        <h2 style="margin-top:0px">T30_tamu <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">Trip No. <?php echo form_error('TripNo') ?></label>
            	<input type="text" class="form-control" name="TripNo" id="TripNo" placeholder="TripNo" value="<?php echo $TripNo; ?>" />
        	</div>
			<!-- <div class="form-group">
            	<label for="date">TripTgl <?php echo form_error('TripTgl') ?></label>
            	<input type="text" class="form-control" name="TripTgl" id="TripTgl" placeholder="TripTgl" value="<?php echo $TripTgl; ?>" />
        	</div> -->
            <div class="form-group col-2">
            	<label for="date">Trip Tgl. <?php echo form_error('TripTgl') ?></label>
            	<!-- <input type="text" class="form-control" name="TripTgl" id="TripTgl" placeholder="TripTgl" value="<?php echo $TripTgl; ?>" /> -->
                <div class="input-group date" id="TripTgl" data-target-input="nearest">
                    <div class="input-group-append" data-target="#TripTgl" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input placeholder="Trip Tgl." type="text" name="TripTgl" value="<?php echo $TripTgl; ?>" class="form-control datetimepicker-input" data-target="#TripTgl"/>
                </div>
        	</div>
			<div class="form-group">
            	<label for="varchar">Name <?php echo form_error('Name') ?></label>
            	<input type="text" class="form-control" name="Name" id="Name" placeholder="Name" value="<?php echo $Name; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">Package Name <?php echo form_error('PackageName') ?></label>
            	<input type="text" class="form-control" name="PackageName" id="PackageName" placeholder="PackageName" value="<?php echo $PackageName; ?>" />
        	</div>
			<div class="form-group">
            	<label for="tinyint">Package Night <?php echo form_error('Night') ?></label>
            	<input type="text" class="form-control" name="Night" id="Night" placeholder="Night" value="<?php echo $Night; ?>" />
        	</div>
			<!-- <div class="form-group">
            	<label for="date">CheckIn <?php echo form_error('CheckIn') ?></label>
            	<input type="text" class="form-control" name="CheckIn" id="CheckIn" placeholder="CheckIn" value="<?php echo $CheckIn; ?>" />
        	</div> -->
            <div class="form-group col-2">
            	<label for="date">Check-In <?php echo form_error('CheckIn') ?></label>
            	<!-- <input type="text" class="form-control" name="CheckIn" id="CheckIn" placeholder="CheckIn" value="<?php echo $CheckIn; ?>" /> -->
                <div class="input-group date" id="CheckIn" data-target-input="nearest">
                    <div class="input-group-append" data-target="#CheckIn" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input placeholder="Check-In" type="text" name="CheckIn" value="<?php echo $CheckIn; ?>" class="form-control datetimepicker-input" data-target="#CheckIn"/>
                </div>
        	</div>
			<div class="form-group">
            	<label for="date">CheckOut <?php echo form_error('CheckOut') ?></label>
            	<input readonly type="text" class="form-control" name="CheckOut" id="CheckOut" placeholder="CheckOut" value="<?php echo $CheckOut; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">Agent <?php echo form_error('Agent') ?></label>
            	<input type="text" class="form-control" name="Agent" id="Agent" placeholder="Agent" value="<?php echo $Agent; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">PriceList <?php echo form_error('PriceList') ?></label>
            	<input type="text" class="form-control" name="PriceList" id="PriceList" placeholder="PriceList" value="<?php echo $PriceList; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">FeeTanas <?php echo form_error('FeeTanas') ?></label>
            	<input type="text" class="form-control" name="FeeTanas" id="FeeTanas" placeholder="FeeTanas" value="<?php echo $FeeTanas; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">PricePay <?php echo form_error('PricePay') ?></label>
            	<input type="text" class="form-control" name="PricePay" id="PricePay" placeholder="PricePay" value="<?php echo $PricePay; ?>" />
        	</div>
			<div class="form-group">
            	<label for="Remarks">Remarks <?php echo form_error('Remarks') ?></label>
            	<textarea class="form-control" rows="3" name="Remarks" id="Remarks" placeholder="Remarks"><?php echo $Remarks; ?></textarea>
        	</div>
			<input type="hidden" name="idtamu" value="<?php echo $idtamu; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t30_tamu') ?>" class="btn btn-secondary">Batal</a>
		</form>

        <script>
            $(document).ready(function () {
                //Date range picker
                $('#TripTgl').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $('#CheckIn').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $('#CheckOut').datetimepicker({
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
