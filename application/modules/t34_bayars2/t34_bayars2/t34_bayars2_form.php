<!doctype html>
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
        <h2 style="margin-top:0px">T34_bayars2 <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="int">Idbayar <?php echo form_error('idbayar') ?></label>
            	<input type="text" class="form-control" name="idbayar" id="idbayar" placeholder="Idbayar" value="<?php echo $idbayar; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">Idtos2 <?php echo form_error('idtos2') ?></label>
            	<input type="text" class="form-control" name="idtos2" id="idtos2" placeholder="Idtos2" value="<?php echo $idtos2; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Jumlah <?php echo form_error('Jumlah') ?></label>
            	<input type="text" class="form-control" name="Jumlah" id="Jumlah" placeholder="Jumlah" value="<?php echo $Jumlah; ?>" />
        	</div>
			<div class="form-group">
            	<label for="tinyint">Idusers <?php echo form_error('idusers') ?></label>
            	<input type="text" class="form-control" name="idusers" id="idusers" placeholder="Idusers" value="<?php echo $idusers; ?>" />
        	</div>
			<div class="form-group">
            	<label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        	</div>
			<div class="form-group">
            	<label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        	</div>
			<input type="hidden" name="idbayars2" value="<?php echo $idbayars2; ?>" /> 
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
			<a href="<?php echo site_url('t34_bayars2') ?>" class="btn btn-secondary">Batal</a>
		</form>
    </body>
</html>