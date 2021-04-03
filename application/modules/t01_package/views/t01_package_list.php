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
        <h2 style="margin-top:0px">T01_package List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t01_package/create'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t01_package/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t01_package'); ?>" class="btn btn-secondary">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
        <!-- <table class="table" style="margin-bottom: 10px"> -->
            <tr>
                <th rowspan="3">No</th>
        		<th colspan="2" rowspan="2">Package</th>
                <th colspan="3" class="text-center">SSW Price</th>
                <th colspan="2" class="text-center">PIW Price</th>
                <th rowspan="3" class="text-center">Proses</th>
            </tr>
            <tr>
                <th class="text-right">3 Nights</th>
                <th class="text-right">6 Nights</th>
                <th class="text-right">Extend /night</th>
                <th class="text-center" colspan="2">1 Night</th>
            </tr>
            <tr>
        		<th>Name</th>
        		<th>Code</th>
        		<th class="text-right">LN</th>
        		<th class="text-right">LN</th>
        		<th class="text-right">LN</th>
                <th class="text-right">LN</th>
                <th class="text-right">DN</th>
            </tr>
            <?php foreach ($t01_package_data as $t01_package) { ?>
            <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $t01_package->PackageName ?></td>
    			<td><?php echo $t01_package->PackageCode ?></td>
    			<td align="right">USD <?php echo numIndo($t01_package->SN3LN) ?></td>
    			<td align="right">USD <?php echo numIndo($t01_package->SN6LN) ?></td>
    			<td align="right">USD <?php echo numIndo($t01_package->SNELN) ?></td>
    			<td align="right">USD <?php echo numIndo($t01_package->PN1LN) ?></td>
    			<td align="right">IDR <?php echo numIndo($t01_package->PN1DN) ?></td>
    			<td style="text-align:center" width="200px">
    				<?php
    				// echo anchor(site_url('t01_package/read/'.$t01_package->idprice),'Read');
    				// echo ' | ';
    				echo anchor(site_url('t01_package/update/'.$t01_package->idprice),'Edit');
    				echo ' | ';
    				echo anchor(site_url('t01_package/delete/'.$t01_package->idprice),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"');
    				?>
    			</td>
    		</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
        		<?php echo anchor(site_url('t01_package/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        		<?php echo anchor(site_url('t01_package/word'), 'Word', 'class="btn btn-primary"'); ?>
    	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
