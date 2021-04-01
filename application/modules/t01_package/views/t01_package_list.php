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
        <h2 style="margin-top:0px">T01_package List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t01_package/create'),'Create', 'class="btn btn-primary"'); ?>
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
                                    <a href="<?php echo site_url('t01_package'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>PackageName</th>
		<th>PackageCode</th>
		<th>SN3LN</th>
		<th>SN6LN</th>
		<th>SNELN</th>
		<th>PN1LN</th>
		<th>PN1DN</th>
		<th>SN3C</th>
		<th>SN3CP</th>
		<th>SN6C</th>
		<th>SN6CP</th>
		<th>SNEC</th>
		<th>SNECP</th>
		<th>PN3C</th>
		<th>PN3CP</th>
		<th>PN6C</th>
		<th>PN6CP</th>
		<th>PNEC</th>
		<th>PNECP</th>
		<th>Created At</th>
		<th>Updated At</th>
		<th>Action</th>
            </tr><?php
            foreach ($t01_package_data as $t01_package)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $t01_package->PackageName ?></td>
			<td><?php echo $t01_package->PackageCode ?></td>
			<td><?php echo $t01_package->SN3LN ?></td>
			<td><?php echo $t01_package->SN6LN ?></td>
			<td><?php echo $t01_package->SNELN ?></td>
			<td><?php echo $t01_package->PN1LN ?></td>
			<td><?php echo $t01_package->PN1DN ?></td>
			<td><?php echo $t01_package->SN3C ?></td>
			<td><?php echo $t01_package->SN3CP ?></td>
			<td><?php echo $t01_package->SN6C ?></td>
			<td><?php echo $t01_package->SN6CP ?></td>
			<td><?php echo $t01_package->SNEC ?></td>
			<td><?php echo $t01_package->SNECP ?></td>
			<td><?php echo $t01_package->PN3C ?></td>
			<td><?php echo $t01_package->PN3CP ?></td>
			<td><?php echo $t01_package->PN6C ?></td>
			<td><?php echo $t01_package->PN6CP ?></td>
			<td><?php echo $t01_package->PNEC ?></td>
			<td><?php echo $t01_package->PNECP ?></td>
			<td><?php echo $t01_package->created_at ?></td>
			<td><?php echo $t01_package->updated_at ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('t01_package/read/'.$t01_package->idprice),'Read'); 
				echo ' | '; 
				echo anchor(site_url('t01_package/update/'.$t01_package->idprice),'Update'); 
				echo ' | '; 
				echo anchor(site_url('t01_package/delete/'.$t01_package->idprice),'Delete','onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('t01_package/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('t01_package/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>