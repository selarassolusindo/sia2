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
        <h2 style="margin-top:0px">T04_tos <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">Type <?php echo form_error('Type') ?></label>
            	<input type="text" class="form-control" name="Type" id="Type" placeholder="Type" value="<?php echo $Type; ?>" />
        	</div>
			<input type="hidden" name="idtos" value="<?php echo $idtos; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t04_tos') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
