<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T32_bayard List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idbayar</th>
		<th>Tamu</th>
		<th>Pt Ci</th>
		<th>Kurs Usd Ci</th>
		<th>Kurs Aud Ci</th>
		<th>Usd Ci</th>
		<th>Aud Ci</th>
		<th>Paypal Ci</th>
		<th>Bca D Ci</th>
		<th>Rp Ci</th>
		<th>Cc Bca Ci</th>
		<th>Cc Mdr Ci</th>
		<th>Tot Rp Ci</th>
		<th>Slsh Ci</th>
		<th>Slsh Blm Ci</th>
		<th>Slsh Krg Ci</th>
		<th>Slsh Disc Ci</th>
		<th>Slsh Chrg Ci</th>
		<th>Slsh Kurs Ci</th>
		<th>Sha Inc Piw</th>
		<th>Sha Inc Ssw</th>
		<th>Paid By</th>
		<th>Idusers</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($t32_bayard_data as $t32_bayard)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t32_bayard->idbayar ?></td>
		      <td><?php echo $t32_bayard->tamu ?></td>
		      <td><?php echo $t32_bayard->pt_ci ?></td>
		      <td><?php echo $t32_bayard->kurs_usd_ci ?></td>
		      <td><?php echo $t32_bayard->kurs_aud_ci ?></td>
		      <td><?php echo $t32_bayard->usd_ci ?></td>
		      <td><?php echo $t32_bayard->aud_ci ?></td>
		      <td><?php echo $t32_bayard->paypal_ci ?></td>
		      <td><?php echo $t32_bayard->bca_d_ci ?></td>
		      <td><?php echo $t32_bayard->rp_ci ?></td>
		      <td><?php echo $t32_bayard->cc_bca_ci ?></td>
		      <td><?php echo $t32_bayard->cc_mdr_ci ?></td>
		      <td><?php echo $t32_bayard->tot_rp_ci ?></td>
		      <td><?php echo $t32_bayard->slsh_ci ?></td>
		      <td><?php echo $t32_bayard->slsh_blm_ci ?></td>
		      <td><?php echo $t32_bayard->slsh_krg_ci ?></td>
		      <td><?php echo $t32_bayard->slsh_disc_ci ?></td>
		      <td><?php echo $t32_bayard->slsh_chrg_ci ?></td>
		      <td><?php echo $t32_bayard->slsh_kurs_ci ?></td>
		      <td><?php echo $t32_bayard->sha_inc_piw ?></td>
		      <td><?php echo $t32_bayard->sha_inc_ssw ?></td>
		      <td><?php echo $t32_bayard->paid_by ?></td>
		      <td><?php echo $t32_bayard->idusers ?></td>
		      <td><?php echo $t32_bayard->created_at ?></td>
		      <td><?php echo $t32_bayard->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>