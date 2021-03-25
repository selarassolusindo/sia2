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
        <h2 style="margin-top:0px">T97_saldoawal List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t97_saldoawal/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t97_saldoawal/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t97_saldoawal'); ?>" class="btn btn-default">Reset</a>
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
        		<th>Idakun</th>
        		<th>Debit</th>
        		<th>Kredit</th>
        		<th>Idusers</th>
        		<th>Created At</th>
        		<th>Updated At</th>
        		<th>Action</th>
            </tr>
            <?php foreach ($t97_saldoawal_data as $t97_saldoawal) { ?>
            <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $t97_saldoawal->idakun ?></td>
    			<td><?php echo $t97_saldoawal->Debit ?></td>
    			<td><?php echo $t97_saldoawal->Kredit ?></td>
    			<td><?php echo $t97_saldoawal->idusers ?></td>
    			<td><?php echo $t97_saldoawal->created_at ?></td>
    			<td><?php echo $t97_saldoawal->updated_at ?></td>
    			<td style="text-align:center" width="200px">
    				<?php
    				echo anchor(site_url('t97_saldoawal/read/'.$t97_saldoawal->idsa),'Read');
    				echo ' | ';
    				echo anchor(site_url('t97_saldoawal/update/'.$t97_saldoawal->idsa),'Update');
    				echo ' | ';
    				echo anchor(site_url('t97_saldoawal/delete/'.$t97_saldoawal->idsa),'Delete','onclick="javascript: return confirm(\'Are You Sure ?\')"');
    				?>
    			</td>
    		</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('t97_saldoawal/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('t97_saldoawal/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
