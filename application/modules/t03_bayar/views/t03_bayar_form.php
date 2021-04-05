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
        <h2 style="margin-top:0px">T03_bayar <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="int">Tamu <?php echo form_error('Tamu') ?></label>
            	<input type="text" class="form-control" name="Tamu" id="Tamu" placeholder="Tamu" value="<?php echo $Tamu; ?>" />
        	</div>
			<div class="form-group">
            	<label for="tinyint">PT <?php echo form_error('PT') ?></label>
            	<input type="text" class="form-control" name="PT" id="PT" placeholder="PT" value="<?php echo $PT; ?>" />
        	</div>
			<div class="form-group">
            	<label for="tinyint">Kurs <?php echo form_error('Kurs') ?></label>
            	<input type="text" class="form-control" name="Kurs" id="Kurs" placeholder="Kurs" value="<?php echo $Kurs; ?>" />
        	</div>
			<div class="form-group">
            	<label for="tinyint">Mata Uang <?php echo form_error('Mata_Uang') ?></label>
            	<input type="text" class="form-control" name="Mata_Uang" id="Mata_Uang" placeholder="Mata Uang" value="<?php echo $Mata_Uang; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Jumlah <?php echo form_error('Jumlah') ?></label>
            	<input type="text" class="form-control" name="Jumlah" id="Jumlah" placeholder="Jumlah" value="<?php echo $Jumlah; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">Paid By <?php echo form_error('Paid_By') ?></label>
            	<input type="text" class="form-control" name="Paid_By" id="Paid_By" placeholder="Paid By" value="<?php echo $Paid_By; ?>" />
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
			<input type="hidden" name="idbayar" value="<?php echo $idbayar; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t03_bayar') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
