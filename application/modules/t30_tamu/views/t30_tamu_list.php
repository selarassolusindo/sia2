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
        <h2 style="margin-top:0px">T30_tamu List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <!-- <?php echo anchor(site_url('t30_tamu/create'),'Tambah', 'class="btn btn-primary"'); ?> -->
                <?php echo anchor(site_url('t30_tamu/import'),'Import', 'class="btn btn-primary"'); ?>
                <?php echo anchor(site_url('import/import_template.xlsx'),'Download Template', 'class="btn btn-secondary"'); ?>
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
        <!-- <div class="table-responsive"> -->
        <?php
        $recordPertama = 1;
        $cetakHeader = 0;
        foreach ($t30_tamu_data as $t30_tamu) {
            if ($recordPertama == 1) {
                $tripNo = $t30_tamu->TripNo;
                $recordPertama = 0;
                $cetakHeader = 1;
            } else {
                if ($tripNo != $t30_tamu->TripNo) {
                    $tripNo = $t30_tamu->TripNo;

                    // close table pertama
                    echo '</tbody>';
                    echo '</table>';
                    echo '<p>&nbsp;</p>';
                    echo '</div>';

                    $cetakHeader = 1;
                }
            }

            if ($cetakHeader == 1) {
                $cetakHeader = 0;
                ?>
                <div class="row">
                    <div class="col-1">
                        NO. BKM
                    </div>
                    <div class="col-1">
                        : <?php echo $t30_tamu->TripNo ?>
                    </div>
                    <div class="col">
                        <?php echo anchor(site_url('t30_tamu/delete/'.$t30_tamu->TripNo),'Hapus BKM NO. ' . $t30_tamu->TripNo,' onclick="javascript: return confirm(\'Apakah BKM NO. '.$t30_tamu->TripNo.' - TGL. '.date_format(date_create($t30_tamu->TripTgl), 'd-m-Y').' akan dihapus ?\')"'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        TGL.
                    </div>
                    <div class="col-1">
                        : <?php echo date_format(date_create($t30_tamu->TripTgl), 'd-m-Y') ?>
                    </div>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered table-striped" style="margin-bottom: 10px">
                    <thead>
                    <tr>
                        <th rowspan="2" class="text-center">NO.</th>
        				<th rowspan="2" class="text-center">NAME</th>
                        <th rowspan="2" class="text-center">M/F</th>
                        <th rowspan="2" class="text-center">COUNTRY</th>
                        <th rowspan="2" class="text-center">ID CARD</th>
        				<th colspan="4" class="text-center">PACKAGE</th>
                        <th rowspan="2" class="text-center">AGENT</th>
                        <th rowspan="2" class="text-center">PRICE LIST</th>
        				<th rowspan="2" class="text-center">FEE TANAS</th>
        				<th rowspan="2" class="text-center">PRICE TO PAY</th>
        				<th rowspan="2" class="text-center">REMARKS</th>
        				<th rowspan="2" class="text-center">PROSES</th>
                    </tr>
                    <tr>
        				<th class="text-center">NAME</th>
                        <th class="text-center">NIGHT</th>
        				<th class="text-center">CHECK IN</th>
        				<th class="text-center">CHECK OUT</th>
                    </tr>
                    </thead>
                    <tbody>
            <?php
            }
            ?>
            <tr>
				<td class="text-right"><?php echo $t30_tamu->no.'.' ?></td>
				<td><?php echo $t30_tamu->Name ?></td>
                <td><?php echo $t30_tamu->MF ?></td>
                <td><?php echo $t30_tamu->Country ?></td>
                <td><?php echo $t30_tamu->IdCard ?></td>
				<td class="text-center"><?php echo $t30_tamu->PackageName ?></td>
				<td class="text-center"><?php echo $t30_tamu->Night ?></td>
				<td class="text-center"><?php echo dateIndo($t30_tamu->CheckIn) ?></td>
				<td class="text-center"><?php echo dateIndo($t30_tamu->CheckOut) ?></td>
				<td><?php echo $t30_tamu->Agent ?></td>
				<td class="text-right"><?php echo numIndo($t30_tamu->PriceList) ?></td>
				<td class="text-right"><?php echo numIndo($t30_tamu->FeeTanas) ?></td>
				<td class="text-right"><?php echo numIndo($t30_tamu->PricePay) ?></td>
				<td><?php echo $t30_tamu->Remarks ?></td>
				<td style="text-align:center">
				<?php
				//echo anchor(site_url('t30_tamu/read/'.$t30_tamu->idtamu),'Read');
				//echo ' | ';
				echo anchor(site_url('t30_tamu/update/'.$t30_tamu->idtamu),'Ubah');
				// echo ' | ';
				// echo anchor(site_url('t30_tamu/delete/'.$t30_tamu->idtamu),'Hapus','onclick="javascript: return confirm(\'Are You Sure ?\')"');
				?>
				</td>
			</tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
				<?php echo anchor(site_url('t30_tamu/excel'), 'Excel', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('t30_tamu/word'), 'Word', 'class="btn btn-primary"'); ?> -->
			</div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
