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
        <h2 style="margin-top:0px">T97_saldoawal <?php echo $button ?></h2> -->
    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idakun <?php echo form_error('idakun') ?></label>
            <input type="text" class="form-control" name="idakun" id="idakun" placeholder="Idakun" value="<?php echo $idakun; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Debit <?php echo form_error('Debit') ?></label>
            <input type="text" class="form-control" name="Debit" id="Debit" placeholder="Debit" value="<?php echo $Debit; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Kredit <?php echo form_error('Kredit') ?></label>
            <input type="text" class="form-control" name="Kredit" id="Kredit" placeholder="Kredit" value="<?php echo $Kredit; ?>" />
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
	    <input type="hidden" name="idsa" value="<?php echo $idsa; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('t97_saldoawal') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!-- </body>
</html> -->
