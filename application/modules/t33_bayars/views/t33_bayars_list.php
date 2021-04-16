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
        <h2 style="margin-top:0px">T33_bayars List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t33_bayars/create'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t33_bayars'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t33_bayars'); ?>" class="btn btn-secondary">Reset</a>
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
				<th>Idbayar</th>
				<th>Idtos</th>
				<th>Jumlah</th>
				<th>Idusers</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th class="text-center">Proses</th>
            </tr>
			<?php foreach ($t33_bayars_data as $t33_bayars) { ?>
            <tr>
				<td width="80px"><?php echo ++$start ?></td>
				<td><?php echo $t33_bayars->idbayar ?></td>
				<td><?php echo $t33_bayars->idtos ?></td>
				<td><?php echo $t33_bayars->Jumlah ?></td>
				<td><?php echo $t33_bayars->idusers ?></td>
				<td><?php echo $t33_bayars->created_at ?></td>
				<td><?php echo $t33_bayars->updated_at ?></td>
				<td style="text-align:center" width="200px">
				<?php 
				//echo anchor(site_url('t33_bayars/read/'.$t33_bayars->idbayars),'Read'); 
				//echo ' | '; 
				echo anchor(site_url('t33_bayars/update/'.$t33_bayars->idbayars),'Ubah'); 
				echo ' | '; 
				echo anchor(site_url('t33_bayars/delete/'.$t33_bayars->idbayars),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"'); 
				?>
				</td>
			</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
				<?php echo anchor(site_url('t33_bayars/excel'), 'Excel', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('t33_bayars/word'), 'Word', 'class="btn btn-primary"'); ?>
			</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>