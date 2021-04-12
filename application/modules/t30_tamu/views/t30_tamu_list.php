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
        <h2 style="margin-top:0px">T30_tamu List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t30_tamu/create'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t30_tamu'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t30_tamu'); ?>" class="btn btn-secondary">Reset</a>
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
				<th>Name</th>
				<th>PackageName</th>
				<th>Night</th>
				<th>CheckIn</th>
				<th>CheckOut</th>
				<th>Agent</th>
				<th>PriceList</th>
				<th>FeeTanas</th>
				<th>PricePay</th>
				<th>Remarks</th>
				<th>Idusers</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th class="text-center">Proses</th>
            </tr>
			<?php foreach ($t30_tamu_data as $t30_tamu) { ?>
            <tr>
				<td width="80px"><?php echo ++$start ?></td>
				<td><?php echo $t30_tamu->TripNo ?></td>
				<td><?php echo $t30_tamu->TripTgl ?></td>
				<td><?php echo $t30_tamu->Name ?></td>
				<td><?php echo $t30_tamu->PackageName ?></td>
				<td><?php echo $t30_tamu->Night ?></td>
				<td><?php echo $t30_tamu->CheckIn ?></td>
				<td><?php echo $t30_tamu->CheckOut ?></td>
				<td><?php echo $t30_tamu->Agent ?></td>
				<td><?php echo $t30_tamu->PriceList ?></td>
				<td><?php echo $t30_tamu->FeeTanas ?></td>
				<td><?php echo $t30_tamu->PricePay ?></td>
				<td><?php echo $t30_tamu->Remarks ?></td>
				<td><?php echo $t30_tamu->idusers ?></td>
				<td><?php echo $t30_tamu->created_at ?></td>
				<td><?php echo $t30_tamu->updated_at ?></td>
				<td style="text-align:center" width="200px">
				<?php 
				//echo anchor(site_url('t30_tamu/read/'.$t30_tamu->idtamu),'Read'); 
				//echo ' | '; 
				echo anchor(site_url('t30_tamu/update/'.$t30_tamu->idtamu),'Ubah'); 
				echo ' | '; 
				echo anchor(site_url('t30_tamu/delete/'.$t30_tamu->idtamu),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
				?>
				</td>
			</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
				<?php echo anchor(site_url('t30_tamu/excel'), 'Excel', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('t30_tamu/word'), 'Word', 'class="btn btn-primary"'); ?>
			</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>