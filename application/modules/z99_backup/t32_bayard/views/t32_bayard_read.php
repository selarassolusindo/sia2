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
        <h2 style="margin-top:0px">T32_bayard Read</h2>
        <table class="table">
	    <tr><td>Idbayar</td><td><?php echo $idbayar; ?></td></tr>
	    <tr><td>Tamu</td><td><?php echo $tamu; ?></td></tr>
	    <tr><td>Pt Ci</td><td><?php echo $pt_ci; ?></td></tr>
	    <tr><td>Kurs Usd Ci</td><td><?php echo $kurs_usd_ci; ?></td></tr>
	    <tr><td>Kurs Aud Ci</td><td><?php echo $kurs_aud_ci; ?></td></tr>
	    <tr><td>Usd Ci</td><td><?php echo $usd_ci; ?></td></tr>
	    <tr><td>Aud Ci</td><td><?php echo $aud_ci; ?></td></tr>
	    <tr><td>Paypal Ci</td><td><?php echo $paypal_ci; ?></td></tr>
	    <tr><td>Bca D Ci</td><td><?php echo $bca_d_ci; ?></td></tr>
	    <tr><td>Rp Ci</td><td><?php echo $rp_ci; ?></td></tr>
	    <tr><td>Cc Bca Ci</td><td><?php echo $cc_bca_ci; ?></td></tr>
	    <tr><td>Cc Mdr Ci</td><td><?php echo $cc_mdr_ci; ?></td></tr>
	    <tr><td>Tot Rp Ci</td><td><?php echo $tot_rp_ci; ?></td></tr>
	    <tr><td>Slsh Ci</td><td><?php echo $slsh_ci; ?></td></tr>
	    <tr><td>Slsh Blm Ci</td><td><?php echo $slsh_blm_ci; ?></td></tr>
	    <tr><td>Slsh Krg Ci</td><td><?php echo $slsh_krg_ci; ?></td></tr>
	    <tr><td>Slsh Disc Ci</td><td><?php echo $slsh_disc_ci; ?></td></tr>
	    <tr><td>Slsh Chrg Ci</td><td><?php echo $slsh_chrg_ci; ?></td></tr>
	    <tr><td>Slsh Kurs Ci</td><td><?php echo $slsh_kurs_ci; ?></td></tr>
	    <tr><td>Sha Inc Piw</td><td><?php echo $sha_inc_piw; ?></td></tr>
	    <tr><td>Sha Inc Ssw</td><td><?php echo $sha_inc_ssw; ?></td></tr>
	    <tr><td>Paid By</td><td><?php echo $paid_by; ?></td></tr>
	    <tr><td>Idusers</td><td><?php echo $idusers; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t32_bayard') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>