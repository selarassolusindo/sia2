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
        <h2 style="margin-top:0px">T31_bayar List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t31_bayar/create'),'Bayar', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t31_bayar'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t31_bayar'); ?>" class="btn btn-secondary">Reset</a>
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
            <tr>
                <th>No.</th>
				<th>TripNo</th>
				<th>TripTgl</th>
				<th class="text-right">Total</th>
				<th class="text-center">Proses</th>
            </tr>
			<?php foreach ($t31_bayar_data as $t31_bayar) { ?>
            <tr>
				<td width="80px"><?php echo ++$start ?></td>
				<td><?php echo $t31_bayar->TripNo ?></td>
				<td><?php echo dateIndo($t31_bayar->TripTgl) ?></td>
				<td><?php echo numIndo($t31_bayar->Total) ?></td>
				<td style="text-align:center" width="200px">
				<?php
				//echo anchor(site_url('t31_bayar/read/'.$t31_bayar->idbayar),'Read');
				//echo ' | ';
				// echo anchor(site_url('t31_bayar/update/'.$t31_bayar->idbayar),'Ubah');
				// echo ' | ';
				// echo anchor(site_url('t31_bayar/delete/'.$t31_bayar->idbayar),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"');
                echo anchor(site_url('t31_bayar/proses/'.$t31_bayar->idbayar), 'Proses');
				?>
				</td>
			</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
				<?php echo anchor(site_url('t31_bayar/excel'), 'Excel', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('t31_bayar/word'), 'Word', 'class="btn btn-primary"'); ?>
			</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
