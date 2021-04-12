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
            	<label for="varchar">Nama <?php echo form_error('Nama') ?></label>
            	<input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama" value="<?php echo $Nama; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">Male / Female / Child <?php echo form_error('MFC') ?></label>
            	<!-- <input type="text" class="form-control" name="MFC" id="MFC" placeholder="MFC" value="<?php echo $MFC; ?>" /> -->
                <select class="form-control" name="MFC">
                    <option value="M" <?php echo $MFC == 'M' ? 'selected' : '' ?>>Male</option>
                    <option value="F" <?php echo $MFC == 'F' ? 'selected' : '' ?>>Female</option>
                    <option value="C" <?php echo $MFC == 'C' ? 'selected' : '' ?>>Child</option>
                </select>
        	</div>
			<div class="form-group">
            	<label for="varchar">Country <?php echo form_error('Country') ?></label>
            	<input type="text" class="form-control" name="Country" id="Country" placeholder="Country" value="<?php echo $Country; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">Package Night <?php echo form_error('PackageNight') ?></label>
            	<input type="text" class="form-control" name="PackageNight" id="PackageNight" placeholder="PackageNight" value="<?php echo $PackageNight; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">Package Type <?php echo form_error('PackageType') ?></label>
            	<!-- <input type="text" class="form-control" name="PackageType" id="PackageType" placeholder="PackageType" value="<?php echo $PackageType; ?>" /> -->
                <select class="form-control" name="PackageType">
                <?php foreach($dataPackage as $dPackage) { ?>
                    <option value="<?php echo $dPackage->PackageCode ?>" <?php echo $dPackage->PackageCode == $PackageType ? 'selected' : '' ?>><?php echo $dPackage->PackageCode ?></option>
                <?php } ?>
                </select>
        	</div>
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
			<div class="form-group col-2">
            	<label for="date">Check-Out <?php echo form_error('CheckOut') ?></label>
            	<!-- <input type="text" class="form-control" name="CheckOut" id="CheckOut" placeholder="CheckOut" value="<?php echo $CheckOut; ?>" /> -->
                <div class="input-group date" id="CheckOut" data-target-input="nearest">
                    <div class="input-group-append" data-target="#CheckOut" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                    <input placeholder="Check-Out" type="text" name="CheckOut" value="<?php echo $CheckOut; ?>" class="form-control datetimepicker-input" data-target="#CheckOut"/>
                </div>
        	</div>
			<div class="form-group">
            	<label for="varchar">Agent <?php echo form_error('Agent') ?></label>
            	<input type="text" class="form-control" name="Agent" id="Agent" placeholder="Agent" value="<?php echo $Agent; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">Status <?php echo form_error('Status') ?></label>
            	<input type="text" class="form-control" name="Status" id="Status" placeholder="Status" value="<?php echo $Status; ?>" />
        	</div>
			<div class="form-group">
            	<label for="tinyint">Days Stay <?php echo form_error('DaysStay') ?></label>
            	<input type="text" class="form-control" name="DaysStay" id="DaysStay" placeholder="DaysStay" value="<?php echo $DaysStay; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Price <?php echo form_error('Price') ?></label>
            	<input type="text" class="form-control" name="Price" id="Price" placeholder="Price" value="<?php echo $Price; ?>" />
        	</div>
			<!-- <div class="form-group">
            	<label for="tinyint">Idusers <?php echo form_error('idusers') ?></label>
            	<input type="text" class="form-control" name="idusers" id="idusers" placeholder="Idusers" value="<?php echo $idusers; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        	</div> -->
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
