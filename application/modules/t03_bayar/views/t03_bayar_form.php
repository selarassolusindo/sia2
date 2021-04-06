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
        <h2 style="margin-top:0px">T03_bayar <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group col-2">
            	<!-- <label for="varchar">TripNo <?php echo form_error('TripNo') ?></label> -->
            	<!-- <input type="text" class="form-control" name="TripNo" id="TripNo" placeholder="TripNo" value="<?php echo $TripNo; ?>" /> -->
                <label for="varchar">Trip No. <?php echo form_error('TripNo') ?></label>
                <select name="TripNo" class="form-control" id="TripNo">
    				<option value="">Trip No.</option>
                    <option value="<?php echo $TripNo ?>" selected="selected"><?php echo $TripNo; ?></option>
    				<?php
    				// foreach($akun_data as $akun)
    				// {
    				// 	$selected = ($akun->idakun == $idakun) ? ' selected="selected"' : "";
    				// 	echo '<option value="'.$akun->idakun.'" '.$selected.'>'.$akun->Kode . ' - ' . $akun->Nama.'</option>';
    				// }
    				?>
    			</select>
        	</div>
			<!-- <div class="form-group">
            	<label for="date">TripTgl <?php echo form_error('TripTgl') ?></label>
            	<input type="text" class="form-control" name="TripTgl" id="TripTgl" placeholder="TripTgl" value="<?php echo $TripTgl; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="double">Total <?php echo form_error('Total') ?></label>
            	<input type="text" class="form-control" name="Total" id="Total" placeholder="Total" value="<?php echo $Total; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="tinyint">Idusers <?php echo form_error('idusers') ?></label>
            	<input type="text" class="form-control" name="idusers" id="idusers" placeholder="Idusers" value="<?php echo $idusers; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        	</div> -->
			<input type="hidden" name="idbayar" value="<?php echo $idbayar; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t03_bayar') ?>" class="btn btn-secondary">Batal</a>
		</form>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#TripNo').select2({
                    minimumInputLength: 3,
                    allowClear: true,
                    placeholder: 'Trip No.',
                    ajax: {
                        dataType: 'json',
                        url: '<?php echo site_url(); ?>t02_tamu/getData',
                        delay: 800,
                        data: function(params) {
                            return {
                                search: params.term
                            }
                        },
                        processResults: function (data, page) {
                            return {
                                results: data
                            };
                        },
                    }
                });
            });
        </script>
    <!-- </body>
</html> -->
