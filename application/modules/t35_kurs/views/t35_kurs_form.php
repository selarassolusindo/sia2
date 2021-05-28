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
        <h2 style="margin-top:0px">T35_kurs <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="varchar">No <?php echo form_error('no') ?></label>
            	<input type="text" class="form-control" name="no" id="no" placeholder="No" value="<?php echo $no; ?>" readonly />
        	</div>
			<div class="form-group">
            	<label for="date">Tgl <?php echo form_error('tgl') ?></label>
            	<input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo dateIndo($tgl); ?>" readonly />
        	</div>
			<div class="form-group">
            	<label for="varchar">Company <?php echo form_error('company') ?></label>
            	<input type="text" class="form-control" name="company" id="company" placeholder="Company" value="<?php echo $company; ?>" readonly />
        	</div>
			<!-- <div class="form-group"> -->
            	<!-- <label for="kurs">Kurs <?php echo form_error('kurs') ?></label> -->
            	<!-- <textarea class="form-control" rows="3" name="kurs" id="kurs" placeholder="Kurs"><?php echo $kurs; ?></textarea> -->
                <?php
                $aKurs = unserialize($dataKurs);
                foreach ($aKurs as $d) {
                    // $dataKurs .= $dKurs['MataUang'] . ' - ' . $dKurs['Nilai'] . ', ';
                    ?>
                    <div class="form-group">
                    <label for="kurs"><?php echo $d['MataUang'] ?></label>
                    <input type="text" class="form-control" name="<?php echo $d['MataUang'] ?>" id="<?php echo $d['MataUang'] ?>" placeholder="<?php echo $d['MataUang'] ?>" value="<?php echo $d['Nilai']; ?>" />
                    </div>
                    <?php
                }
                ?>
        	<!-- </div> -->
			<input type="hidden" name="idbkm" value="<?php echo $idbkm; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t30_tamu') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
