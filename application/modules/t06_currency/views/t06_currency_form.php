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
        <h2 style="margin-top:0px">T06_currency <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">Currency <?php echo form_error('Currency') ?></label>
            	<input type="text" class="form-control" name="Currency" id="Currency" placeholder="Currency" value="<?php echo $Currency; ?>" />
        	</div>
			<div class="form-group">
            	<label for="varchar">Konstanta <?php echo form_error('Konstanta') ?></label>
            	<input type="text" class="form-control" name="Konstanta" id="Konstanta" placeholder="Konstanta" value="<?php echo $Konstanta; ?>" />
        	</div>
			<input type="hidden" name="idcurrency" value="<?php echo $idcurrency; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t06_currency') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
