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
        <h2 style="margin-top:0px">T99_company List</h2> -->
        <!-- <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php //echo anchor(site_url('t99_company/create'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t99_company/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t99_company'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div> -->
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <!-- <th class="text-center">No.</th> -->
		<th class="text-center">Nama</th>
		<th class="text-center">Alamat</th>
		<th class="text-center">Kota</th>
		<!-- <th>Idusers</th> -->
		<!-- <th>Created At</th> -->
		<!-- <th>Updated At</th> -->
		<th class="text-center">Proses</th>
            </tr><?php
            foreach ($t99_company_data as $t99_company)
            {
                ?>
                <tr>
			<!-- <td class="text-right" width="80px"><?php echo ++$start . '.' ?></td> -->
			<td><?php echo $t99_company->Nama ?></td>
			<td><?php echo $t99_company->Alamat ?></td>
			<td><?php echo $t99_company->Kota ?></td>
			<!-- <td><?php echo $t99_company->idusers ?></td> -->
			<!-- <td><?php echo $t99_company->created_at ?></td> -->
			<!-- <td><?php echo $t99_company->updated_at ?></td> -->
			<td style="text-align:center" width="200px">
				<?php
				echo anchor(site_url('t99_company/read/'.$t99_company->idcompany),'Lihat');
				echo ' | ';
				echo anchor(site_url('t99_company/update/'.$t99_company->idcompany),'Ubah');
				// echo ' | ';
				// echo anchor(site_url('t99_company/delete/'.$t99_company->idcompany),'Hapus','onclick="javascript: return confirm(\'Apakah data akan dihapus ?\')"');
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <!-- <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('t99_company/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('t99_company/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div> -->
    <!-- </body>
</html> -->
