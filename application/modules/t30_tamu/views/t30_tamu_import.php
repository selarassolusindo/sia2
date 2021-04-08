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
        <h2 style="margin-top:0px">T02_tamu <?php echo $button ?></h2> -->
        <?php echo $this->session->flashdata('notif'); ?>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
                <label for="userfile">Import file Excel</label>
                <input type="file" name="userfile" class="form-control-file">
        	</div>
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t30_tamu') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
