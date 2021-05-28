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
        <h2 style="margin-top:0px">T35_kurs Read</h2>
        <table class="table">
	    <tr><td>No</td><td><?php echo $no; ?></td></tr>
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Company</td><td><?php echo $company; ?></td></tr>
	    <tr><td>Kurs</td><td><?php echo $kurs; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t35_kurs') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>