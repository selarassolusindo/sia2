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
        <h2 style="margin-top:0px">T03_bayar Read</h2>
        <table class="table">
	    <tr><td>TripNo</td><td><?php echo $TripNo; ?></td></tr>
	    <tr><td>TripTgl</td><td><?php echo $TripTgl; ?></td></tr>
	    <tr><td>Total</td><td><?php echo $Total; ?></td></tr>
	    <tr><td>Idusers</td><td><?php echo $idusers; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t03_bayar') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>