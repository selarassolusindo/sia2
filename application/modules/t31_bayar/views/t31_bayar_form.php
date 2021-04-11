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
        <h2 style="margin-top:0px">T31_bayar <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="int">Idtamu <?php echo form_error('idtamu') ?></label>
            	<input type="text" class="form-control" name="idtamu" id="idtamu" placeholder="Idtamu" value="<?php echo $idtamu; ?>" />
        	</div>
            <?php foreach($dataTop as $dTop) { ?>
            <div class="form-group">
                <label for="int"><?php echo $dTop->Type ?></label>
                <input type="text" name="_<?php echo $dTop->idtop?>" value="">
            </div>
            <?php } ?>
			<input type="hidden" name="idbayar" value="<?php echo $idbayar; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t31_bayar') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
