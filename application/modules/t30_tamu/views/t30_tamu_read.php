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
        <h2 style="margin-top:0px">T30_tamu Read</h2>
        <table class="table">
	    <tr><td>TripNo</td><td><?php echo $TripNo; ?></td></tr>
	    <tr><td>TripTgl</td><td><?php echo $TripTgl; ?></td></tr>
	    <tr><td>Name</td><td><?php echo $Name; ?></td></tr>
	    <tr><td>PackageName</td><td><?php echo $PackageName; ?></td></tr>
	    <tr><td>Night</td><td><?php echo $Night; ?></td></tr>
	    <tr><td>CheckIn</td><td><?php echo $CheckIn; ?></td></tr>
	    <tr><td>CheckOut</td><td><?php echo $CheckOut; ?></td></tr>
	    <tr><td>Agent</td><td><?php echo $Agent; ?></td></tr>
	    <tr><td>PriceList</td><td><?php echo $PriceList; ?></td></tr>
	    <tr><td>FeeTanas</td><td><?php echo $FeeTanas; ?></td></tr>
	    <tr><td>PricePay</td><td><?php echo $PricePay; ?></td></tr>
	    <tr><td>Remarks</td><td><?php echo $Remarks; ?></td></tr>
	    <tr><td>Idusers</td><td><?php echo $idusers; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t30_tamu') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>