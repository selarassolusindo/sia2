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
	    <tr><td>Tamu</td><td><?php echo $Tamu; ?></td></tr>
	    <tr><td>PT</td><td><?php echo $PT; ?></td></tr>
	    <tr><td>Kurs</td><td><?php echo $Kurs; ?></td></tr>
	    <tr><td>Mata Uang</td><td><?php echo $Mata_Uang; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $Jumlah; ?></td></tr>
	    <tr><td>Paid By</td><td><?php echo $Paid_By; ?></td></tr>
	    <tr><td>Idusers</td><td><?php echo $idusers; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t03_bayar') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>