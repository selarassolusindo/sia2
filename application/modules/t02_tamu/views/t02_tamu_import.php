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
        <h2 style="margin-top:0px">T02_tamu <?php echo $button ?></h2> -->
        <?php echo $this->session->flashdata('notif'); ?>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			<!-- <div class="form-group"> -->
            	<!-- <label for="varchar">TripNo <?php echo form_error('TripNo') ?></label> -->
            	<!-- <input type="text" class="form-control" name="TripNo" id="TripNo" placeholder="TripNo" value="<?php echo $TripNo; ?>" /> -->
                <!-- <label for="userfile">Import file Excel</label> -->
                <!-- <input type="file" name="userfile" class="form-control"> -->
        	<!-- </div> -->
            <div class="form-group col-sm-4">
                <!-- <label for="exampleInputFile">Import file Excel</label> -->
                <!-- <div class="input-group"> -->
                    <div class="custom-file">
                        <input type="file" name="userfile" class="custom-file-input" id="exampleInputFile">
                        <!-- <label class="custom-file-label" for="exampleInputFile">Choose file</label> -->
                        <label class="custom-file-label" for="exampleInputFile">Import file Excel</label>
                    </div>
                    <!-- <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div> -->
                <!-- </div> -->
            </div>
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t02_tamu') ?>" class="btn btn-default">Batal</a>
		</form>
    <!-- </body>
</html> -->
