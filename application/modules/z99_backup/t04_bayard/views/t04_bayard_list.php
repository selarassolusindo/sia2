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
        <h2 style="margin-top:0px">T04_bayard List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <!-- <?php echo anchor(site_url('t04_bayard/create'),'Tambah', 'class="btn btn-primary"'); ?> -->
                <p>Trip No. <?php echo $dataTrip->TripNo . ' @ ' . date_format(date_create($dataTrip->TripTgl), 'd-m-Y') ?></p>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t04_bayard'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <!-- <input type="text" class="form-control" name="q" value="<?php echo $q; ?>"> -->
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <!-- <a href="<?php echo site_url('t04_bayard'); ?>" class="btn btn-secondary">Reset</a> -->
                                    <?php
                                }
                            ?>
                          <!-- <button class="btn btn-primary" type="submit">Cari</button> -->
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th rowspan="2" class="text-center">NO.</th>
				<th rowspan="2" class="text-center">TAMU</th>
				<th rowspan="2" class="text-center">PT</th>
                <th colspan="2" class="text-center">KURS</th>
                <th colspan="7" class="text-center">PAYMENT C/I</th>
				<th rowspan="2" class="text-center">TOTAL Rp</th>
				<th rowspan="2" class="text-center">SELISIH</th>
                <th colspan="5" class="text-center">SELISIH</th>
                <th colspan="2" class="text-center">SHARE INCOME</th>
				<th rowspan="2" class="text-center">PAID BY</th>
				<th rowspan="2" class="text-center">PROSES</th>
            </tr>
            <tr>
                <th>USD</th>
				<th>AUD</th>
                <th>USD</th>
				<th>AUD</th>
				<th>Paypal</th>
				<th>BCA $</th>
				<th>Rp</th>
				<th>CC BCA</th>
				<th>CC MDR</th>
                <th>Belum Bayar</th>
				<th>Kurang Bayar</th>
				<th>Discount</th>
				<th>Charge CC</th>
				<th>Slsh. Kurs</th>
                <th>PIW</th>
				<th>SSW</th>
            </tr>
			<?php foreach ($t04_bayard_data as $t04_bayard) { ?>
            <tr>
				<td width="80px"><?php echo ++$start ?></td>
				<td><?php echo $t04_bayard->Nama ?></td>
				<td><?php echo $t04_bayard->pt_ci ?></td>
				<td><?php echo $t04_bayard->kurs_usd_ci ?></td>
				<td><?php echo $t04_bayard->kurs_aud_ci ?></td>
				<td><?php echo $t04_bayard->usd_ci ?></td>
				<td><?php echo $t04_bayard->aud_ci ?></td>
				<td><?php echo $t04_bayard->paypal_ci ?></td>
				<td><?php echo $t04_bayard->bca_d_ci ?></td>
				<td><?php echo $t04_bayard->rp_ci ?></td>
				<td><?php echo $t04_bayard->cc_bca_ci ?></td>
				<td><?php echo $t04_bayard->cc_mdr_ci ?></td>
				<td><?php echo $t04_bayard->tot_rp_ci ?></td>
				<td><?php echo $t04_bayard->slsh_ci ?></td>
				<td><?php echo $t04_bayard->slsh_blm_ci ?></td>
				<td><?php echo $t04_bayard->slsh_krg_ci ?></td>
				<td><?php echo $t04_bayard->slsh_disc_ci ?></td>
				<td><?php echo $t04_bayard->slsh_chrg_ci ?></td>
				<td><?php echo $t04_bayard->slsh_kurs_ci ?></td>
				<td><?php echo $t04_bayard->sha_inc_piw ?></td>
				<td><?php echo $t04_bayard->sha_inc_ssw ?></td>
				<td><?php echo $t04_bayard->paid_by ?></td>
				<td style="text-align:center" width="200px">
				<?php
				//echo anchor(site_url('t04_bayard/read/'.$t04_bayard->idbayard),'Read');
				//echo ' | ';
				echo anchor(site_url('t04_bayard/update/'.$t04_bayard->idbayard),'Ubah');
				// echo ' | ';
				// echo anchor(site_url('t04_bayard/delete/'.$t04_bayard->idbayard),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"');
				?>
				</td>
			</tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a> -->
				<!-- <?php echo anchor(site_url('t04_bayard/excel'), 'Excel', 'class="btn btn-primary"'); ?> -->
				<!-- <?php echo anchor(site_url('t04_bayard/word'), 'Word', 'class="btn btn-primary"'); ?> -->
                <?php echo anchor(site_url('t03_bayar'), 'Kembali', 'class="btn btn-primary"'); ?>
			</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
