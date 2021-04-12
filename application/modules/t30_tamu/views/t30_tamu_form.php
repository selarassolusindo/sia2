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
            	<label for="varchar">TripNo <?php echo form_error('TripNo') ?></label>
            	<input type="text" class="form-control" name="TripNo" id="TripNo" placeholder="TripNo" value="<?php echo $TripNo; ?>" />
        	</div>
			<div class="form-group">
            	<label for="date">TripTgl <?php echo form_error('TripTgl') ?></label>
            	<input type="text" class="form-control" name="TripTgl" id="TripTgl" placeholder="TripTgl" value="<?php echo $TripTgl; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">Name <?php echo form_error('Name') ?></label>
            	<input type="text" class="form-control" name="Name" id="Name" placeholder="Name" value="<?php echo $Name; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">PackageName <?php echo form_error('PackageName') ?></label>
            	<input type="text" class="form-control" name="PackageName" id="PackageName" placeholder="PackageName" value="<?php echo $PackageName; ?>" />
        	</div>
			<div class="form-group">
            	<label for="tinyint">Night <?php echo form_error('Night') ?></label>
            	<input type="text" class="form-control" name="Night" id="Night" placeholder="Night" value="<?php echo $Night; ?>" />
        	</div>
			<div class="form-group">
            	<label for="date">CheckIn <?php echo form_error('CheckIn') ?></label>
            	<input type="text" class="form-control" name="CheckIn" id="CheckIn" placeholder="CheckIn" value="<?php echo $CheckIn; ?>" />
        	</div>
			<div class="form-group">
            	<label for="date">CheckOut <?php echo form_error('CheckOut') ?></label>
            	<input type="text" class="form-control" name="CheckOut" id="CheckOut" placeholder="CheckOut" value="<?php echo $CheckOut; ?>" />
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
    <!-- </body>
</html> -->
