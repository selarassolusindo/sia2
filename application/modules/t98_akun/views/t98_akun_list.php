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
        <h2 style="margin-top:0px">T98_akun List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <!-- <?php echo anchor(site_url('t98_akun/create'),'Create', 'class="btn btn-primary"'); ?> -->
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t98_akun/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t98_akun'); ?>" class="btn btn-secondary">Reset</a>
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
                <!-- <th>No</th> -->
        		<th class="text-center">No. Akun</th>
        		<th class="text-center">Nama</th>
        		<!-- <th>Induk</th> -->
        		<!-- <th>Urut</th> -->
        		<!-- <th>Idusers</th> -->
        		<!-- <th>Created At</th> -->
        		<!-- <th>Updated At</th> -->
        		<th class="text-center">Proses</th>
            </tr>
            <?php foreach ($t98_akun_data as $t98_akun) { ?>
            <tr>
    			<!-- <td width="80px"><?php echo ++$start ?></td> -->
    			<td><?php echo $t98_akun->Kode ?></td>
    			<!-- <td><?php echo $t98_akun->Nama ?></td> -->
                <td><?php echo formatNamaAkun($akunLastLevel, $t98_akun) ?></td>
    			<!-- <td><?php echo $t98_akun->Induk ?></td> -->
    			<!-- <td><?php echo $t98_akun->Urut ?></td> -->
    			<!-- <td><?php echo $t98_akun->idusers ?></td> -->
    			<!-- <td><?php echo $t98_akun->created_at ?></td> -->
    			<!-- <td><?php echo $t98_akun->updated_at ?></td> -->
    			<td style="text-align:center" width="200px">
    				<?php
    				// echo anchor(site_url('t98_akun/read/'.$t98_akun->idakun),'Read');
                    echo anchor(site_url('t98_akun/create/'.$t98_akun->idakun),'Tambah');
    				echo ' | ';
    				echo anchor(site_url('t98_akun/update/'.$t98_akun->idakun),'Ubah');
    				echo ' | ';
    				echo anchor(site_url('t98_akun/delete/'.$t98_akun->idakun),'Hapus','onclick="javascript: return confirm(\'Apakah data akan dihapus ?\')"');
    				?>
    			</td>
    		</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('t98_akun/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('t98_akun/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
