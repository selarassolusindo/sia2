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
        <h2 style="margin-top:0px">V01_bukubesar List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('v01_bukubesar/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('v01_bukubesar/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('v01_bukubesar'); ?>" class="btn btn-default">Reset</a>
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
		<th>Kode</th>
		<th>Nama</th>
		<th>Induk</th>
		<th>Urut</th>
		<th>Debit</th>
		<th>Kredit</th>
		<th>Action</th>
            </tr><?php
            foreach ($v01_bukubesar_data as $v01_bukubesar)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $v01_bukubesar->idakun ?></td>
			<td><?php echo $v01_bukubesar->Kode ?></td>
			<td><?php echo $v01_bukubesar->Nama ?></td>
			<td><?php echo $v01_bukubesar->Induk ?></td>
			<td><?php echo $v01_bukubesar->Urut ?></td>
			<td><?php echo $v01_bukubesar->Debit ?></td>
			<td><?php echo $v01_bukubesar->Kredit ?></td>
			<td style="text-align:center" width="200px">
				<?php
				echo anchor(site_url('v01_bukubesar/read/'.$v01_bukubesar->idakun),'Read');
				echo ' | ';
				echo anchor(site_url('v01_bukubesar/update/'.$v01_bukubesar->idakun),'Update');
				echo ' | ';
				echo anchor(site_url('v01_bukubesar/delete/'.$v01_bukubesar->idakun),'Delete','onclick="javascript: return confirm(\'Are You Sure ?\')"');
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
		<?php echo anchor(site_url('v01_bukubesar/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('v01_bukubesar/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
