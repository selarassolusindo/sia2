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
        <h2 style="margin-top:0px">T02_tamu List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t02_tamu/create'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t02_tamu/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t02_tamu'); ?>" class="btn btn-default">Reset</a>
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
                <th>No</th>
				<th>TripNo</th>
				<th>TripTgl</th>
				<th>Nama</th>
				<th>MFC</th>
				<th>Country</th>
				<th>PackageNight</th>
				<th>PackageType</th>
				<th>CheckIn</th>
				<th>CheckOut</th>
				<th>Agent</th>
				<th>Status</th>
				<th>DaysStay</th>
				<th>Price</th>
				<!-- <th>Idusers</th>
				<th>Created At</th>
				<th>Updated At</th> -->
				<th>Proses</th>
            </tr>
			<?php foreach ($t02_tamu_data as $t02_tamu) { ?>
            <tr>
				<td width="80px"><?php echo ++$start ?></td>
				<td><?php echo $t02_tamu->TripNo ?></td>
				<td><?php echo $t02_tamu->TripTgl ?></td>
				<td><?php echo $t02_tamu->Nama ?></td>
				<td><?php echo $t02_tamu->MFC ?></td>
				<td><?php echo $t02_tamu->Country ?></td>
				<td><?php echo $t02_tamu->PackageNight ?></td>
				<td><?php echo $t02_tamu->PackageType ?></td>
				<td><?php echo $t02_tamu->CheckIn ?></td>
				<td><?php echo $t02_tamu->CheckOut ?></td>
				<td><?php echo $t02_tamu->Agent ?></td>
				<td><?php echo $t02_tamu->Status ?></td>
				<td><?php echo $t02_tamu->DaysStay ?></td>
				<td><?php echo $t02_tamu->Price ?></td>
				<!-- <td><?php echo $t02_tamu->idusers ?></td>
				<td><?php echo $t02_tamu->created_at ?></td>
				<td><?php echo $t02_tamu->updated_at ?></td> -->
				<td style="text-align:center" width="200px">
				<?php
				//echo anchor(site_url('t02_tamu/read/'.$t02_tamu->idtamu),'Read');
				//echo ' | ';
				echo anchor(site_url('t02_tamu/update/'.$t02_tamu->idtamu),'Edit');
				echo ' | ';
				echo anchor(site_url('t02_tamu/delete/'.$t02_tamu->idtamu),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"');
				?>
				</td>
			</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
				<?php echo anchor(site_url('t02_tamu/excel'), 'Excel', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('t02_tamu/word'), 'Word', 'class="btn btn-primary"'); ?>
			</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
