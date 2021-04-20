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
        <h2 style="margin-top:0px">T05_tos2 <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">Type <?php echo form_error('Type') ?></label>
            	<input type="text" class="form-control" name="Type" id="Type" placeholder="Type" value="<?php echo $Type; ?>" />
        	</div>
			<input type="hidden" name="idtos2" value="<?php echo $idtos2; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t05_tos2') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
