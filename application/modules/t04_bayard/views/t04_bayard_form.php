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
        <h2 style="margin-top:0px">T04_bayard <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="int">Idbayar <?php echo form_error('idbayar') ?></label>
            	<input type="text" class="form-control" name="idbayar" id="idbayar" placeholder="Idbayar" value="<?php echo $idbayar; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">Tamu <?php echo form_error('tamu') ?></label>
            	<input type="text" class="form-control" name="tamu" id="tamu" placeholder="Tamu" value="<?php echo $tamu; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">Pt Ci <?php echo form_error('pt_ci') ?></label>
            	<input type="text" class="form-control" name="pt_ci" id="pt_ci" placeholder="Pt Ci" value="<?php echo $pt_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Kurs Usd Ci <?php echo form_error('kurs_usd_ci') ?></label>
            	<input type="text" class="form-control" name="kurs_usd_ci" id="kurs_usd_ci" placeholder="Kurs Usd Ci" value="<?php echo $kurs_usd_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Kurs Aud Ci <?php echo form_error('kurs_aud_ci') ?></label>
            	<input type="text" class="form-control" name="kurs_aud_ci" id="kurs_aud_ci" placeholder="Kurs Aud Ci" value="<?php echo $kurs_aud_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Usd Ci <?php echo form_error('usd_ci') ?></label>
            	<input type="text" class="form-control" name="usd_ci" id="usd_ci" placeholder="Usd Ci" value="<?php echo $usd_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Aud Ci <?php echo form_error('aud_ci') ?></label>
            	<input type="text" class="form-control" name="aud_ci" id="aud_ci" placeholder="Aud Ci" value="<?php echo $aud_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Paypal Ci <?php echo form_error('paypal_ci') ?></label>
            	<input type="text" class="form-control" name="paypal_ci" id="paypal_ci" placeholder="Paypal Ci" value="<?php echo $paypal_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Bca D Ci <?php echo form_error('bca_d_ci') ?></label>
            	<input type="text" class="form-control" name="bca_d_ci" id="bca_d_ci" placeholder="Bca D Ci" value="<?php echo $bca_d_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Rp Ci <?php echo form_error('rp_ci') ?></label>
            	<input type="text" class="form-control" name="rp_ci" id="rp_ci" placeholder="Rp Ci" value="<?php echo $rp_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Cc Bca Ci <?php echo form_error('cc_bca_ci') ?></label>
            	<input type="text" class="form-control" name="cc_bca_ci" id="cc_bca_ci" placeholder="Cc Bca Ci" value="<?php echo $cc_bca_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Cc Mdr Ci <?php echo form_error('cc_mdr_ci') ?></label>
            	<input type="text" class="form-control" name="cc_mdr_ci" id="cc_mdr_ci" placeholder="Cc Mdr Ci" value="<?php echo $cc_mdr_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Tot Rp Ci <?php echo form_error('tot_rp_ci') ?></label>
            	<input type="text" class="form-control" name="tot_rp_ci" id="tot_rp_ci" placeholder="Tot Rp Ci" value="<?php echo $tot_rp_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Slsh Ci <?php echo form_error('slsh_ci') ?></label>
            	<input type="text" class="form-control" name="slsh_ci" id="slsh_ci" placeholder="Slsh Ci" value="<?php echo $slsh_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Slsh Blm Ci <?php echo form_error('slsh_blm_ci') ?></label>
            	<input type="text" class="form-control" name="slsh_blm_ci" id="slsh_blm_ci" placeholder="Slsh Blm Ci" value="<?php echo $slsh_blm_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Slsh Krg Ci <?php echo form_error('slsh_krg_ci') ?></label>
            	<input type="text" class="form-control" name="slsh_krg_ci" id="slsh_krg_ci" placeholder="Slsh Krg Ci" value="<?php echo $slsh_krg_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Slsh Disc Ci <?php echo form_error('slsh_disc_ci') ?></label>
            	<input type="text" class="form-control" name="slsh_disc_ci" id="slsh_disc_ci" placeholder="Slsh Disc Ci" value="<?php echo $slsh_disc_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Slsh Chrg Ci <?php echo form_error('slsh_chrg_ci') ?></label>
            	<input type="text" class="form-control" name="slsh_chrg_ci" id="slsh_chrg_ci" placeholder="Slsh Chrg Ci" value="<?php echo $slsh_chrg_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Slsh Kurs Ci <?php echo form_error('slsh_kurs_ci') ?></label>
            	<input type="text" class="form-control" name="slsh_kurs_ci" id="slsh_kurs_ci" placeholder="Slsh Kurs Ci" value="<?php echo $slsh_kurs_ci; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Sha Inc Piw <?php echo form_error('sha_inc_piw') ?></label>
            	<input type="text" class="form-control" name="sha_inc_piw" id="sha_inc_piw" placeholder="Sha Inc Piw" value="<?php echo $sha_inc_piw; ?>" />
        	</div>
			<div class="form-group">
            	<label for="double">Sha Inc Ssw <?php echo form_error('sha_inc_ssw') ?></label>
            	<input type="text" class="form-control" name="sha_inc_ssw" id="sha_inc_ssw" placeholder="Sha Inc Ssw" value="<?php echo $sha_inc_ssw; ?>" />
        	</div>
			<div class="form-group">
            	<label for="int">Paid By <?php echo form_error('paid_by') ?></label>
            	<input type="text" class="form-control" name="paid_by" id="paid_by" placeholder="Paid By" value="<?php echo $paid_by; ?>" />
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
			<input type="hidden" name="idbayard" value="<?php echo $idbayard; ?>" /> 
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
			<a href="<?php echo site_url('t04_bayard') ?>" class="btn btn-secondary">Batal</a>
		</form>
    </body>
</html>