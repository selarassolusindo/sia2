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
        <h2 style="margin-top:0px">T34_bayars2 List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t34_bayars2/create'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t34_bayars2'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t34_bayars2'); ?>" class="btn btn-secondary">Reset</a>
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
                <th class="text-right">No.</th>
				<th>Idbayar</th>
				<th>Idtos2</th>
				<th>Jumlah</th>
				<th>Idusers</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th class="text-center">Proses</th>
            </tr>
			<?php foreach ($t34_bayars2_data as $t34_bayars2) { ?>
            <tr>
				<td width="80px" class="text-right"><?php echo ++$start ?></td>
				<td><?php echo $t34_bayars2->idbayar ?></td>
				<td><?php echo $t34_bayars2->idtos2 ?></td>
				<td><?php echo $t34_bayars2->Jumlah ?></td>
				<td><?php echo $t34_bayars2->idusers ?></td>
				<td><?php echo $t34_bayars2->created_at ?></td>
				<td><?php echo $t34_bayars2->updated_at ?></td>
				<td style="text-align:center" width="200px">
				<?php 
				//echo anchor(site_url('t34_bayars2/read/'.$t34_bayars2->idbayars2),'Read'); 
				//echo ' | '; 
				echo anchor(site_url('t34_bayars2/update/'.$t34_bayars2->idbayars2),'Ubah'); 
				echo ' | '; 
				echo anchor(site_url('t34_bayars2/delete/'.$t34_bayars2->idbayars2),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
				?>
				</td>
			</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
				<?php echo anchor(site_url('t34_bayars2/excel'), 'Excel', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('t34_bayars2/word'), 'Word', 'class="btn btn-primary"'); ?>
			</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>