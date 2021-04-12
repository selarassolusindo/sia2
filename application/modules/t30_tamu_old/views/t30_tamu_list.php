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
                <?php echo anchor(site_url('import/import_template.xls'),'Download Template', 'class="btn btn-secondary"'); ?>
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
                    echo '</table>';
                    echo '<p>&nbsp;</p>';

                    $cetakHeader = 1;
                }
            }

            if ($cetakHeader == 1) {
                $cetakHeader = 0;

                echo 'Trip No. <b>' . $t30_tamu->TripNo . '</b>';
                echo ' @ ';
                echo '<b>' . date_format(date_create($t30_tamu->TripTgl), 'd-m-Y') . '</b>';
        ?>
                <table class="table table-bordered" style="margin-bottom: 10px">
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Name</th>
                    <th rowspan="2">MFC</th>
                    <th rowspan="2">Country</th>
                    <th rowspan="2">ID No.</th>
                    <th colspan="2">Package</th>
                    <th rowspan="2">Check-In</th>
                    <th rowspan="2">Check-Out</th>
                    <th rowspan="2">Agent</th>
                    <th rowspan="2">Days Stay</th>
                    <th rowspan="2" class="text-right">Price</th>
                    <th rowspan="2" class="text-center">Proses</th>
                </tr>
                <tr>
                    <th>Night</th>
                    <th>Type</th>
                </tr>
        <?php
            }
        ?>
            <tr>
                <td width="80px"><?php echo ++$start ?></td>
                <!-- <td><?php echo $t30_tamu->TripNo ?></td> -->
                <!-- <td><?php echo date_format(date_create($t30_tamu->TripTgl), 'd-m-Y') ?></td> -->
                <td><?php echo $t30_tamu->Nama ?></td>
                <td><?php echo $t30_tamu->MFC ?></td>
                <td><?php echo $t30_tamu->Country ?></td>
                <td><?php echo $t30_tamu->IDNo ?></td>
                <td><?php echo $t30_tamu->PackageNight ?></td>
                <td><?php echo $t30_tamu->PackageType ?></td>
                <td><?php echo date_format(date_create($t30_tamu->CheckIn), 'd-m-Y') ?></td>
                <td><?php echo date_format(date_create($t30_tamu->CheckOut), 'd-m-Y') ?></td>
                <td><?php echo $t30_tamu->Agent ?></td>
                <td><?php echo $t30_tamu->DaysStay ?></td>
                <td class="text-right"><?php echo numIndo($t30_tamu->Price) ?></td>
                <!-- <td><?php echo $t30_tamu->idusers ?></td>
                <td><?php echo $t30_tamu->created_at ?></td>
                <td><?php echo $t30_tamu->updated_at ?></td> -->
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
    <!-- </body>
</html> -->
