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
        <h2 style="margin-top:0px">T97_saldoawal List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t97_saldoawal/create'),'Tambah', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t97_saldoawal/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t97_saldoawal'); ?>" class="btn btn-secondary">Reset</a>
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
                <th class="text-center">No. Akun</th>
                <th class="text-center">Nama</th>
        		<th class="text-center">Debit</th>
        		<th class="text-center">Kredit</th>
        		<th class="text-center">Proses</th>
            </tr>
            <?php
            $totalDebit = 0;
            $totalKredit = 0;
            ?>
            <?php foreach ($t97_saldoawal_data as $t97_saldoawal) { ?>
            <tr>
                <td><?php echo $t97_saldoawal->Kode ?></td>
                <td><?php echo $t97_saldoawal->Nama ?></td>
    			<td class="text-right"><?php echo numIndo($t97_saldoawal->Debit) ?></td>
    			<td class="text-right"><?php echo numIndo($t97_saldoawal->Kredit) ?></td>
    			<td style="text-align:center" width="200px">
    				<?php
    				// echo anchor(site_url('t97_saldoawal/read/'.$t97_saldoawal->idsa),'Lihat');
    				// echo ' | ';
    				echo anchor(site_url('t97_saldoawal/update/'.$t97_saldoawal->idsa),'Ubah');
    				echo ' | ';
    				echo anchor(site_url('t97_saldoawal/delete/'.$t97_saldoawal->idsa),'Hapus','onclick="javascript: return confirm(\'Apakah data akan dihapus ?\')"');
    				?>
    			</td>
    		</tr>
            <?php
            $totalDebit += $t97_saldoawal->Debit;
            $totalKredit += $t97_saldoawal->Kredit;
            ?>
            <?php } ?>
            <tr>
                <th>&nbsp;</th>
        		<th>&nbsp;</th>
        		<th>&nbsp;</th>
        		<th>&nbsp;</th>
        		<th>&nbsp;</th>
            </tr>
            <tr>
        		<th colspan="2" style="text-align:right">Sub Total</th>
        		<td align="right"><b><?php echo numIndo($totalDebit); ?></b></td>
        		<td align="right"><b><?php echo numIndo($totalKredit); ?></b></td>
        		<th>&nbsp;</th>
            </tr>
            <tr>
        		<th colspan="2" style="text-align:right">Grand Total</th>
        		<td align="right"><b><?php echo numIndo($total->Debit); ?></b></td>
        		<td align="right"><b><?php echo numIndo($total->Kredit); ?></b></td>
        		<th>&nbsp;</th>
            </tr>
            <?php
            if ($total->Debit == $total->Kredit) {

            } else {
                if ($total->Debit > $total->Kredit) {
                    $selisih1 = 0;
                    $selisih2 = $total->Debit - $total->Kredit;
                } else {
                    $selisih1 = $total->Kredit - $total->Debit;
                    $selisih2 = 0;
                }
                ?>
                <tr>
            		<th colspan="2" style="text-align:right; color:red">Selisih</th>
            		<td align="right" style="text-align:right; color:red"><b><?php echo numIndo($selisih1); ?></b></td>
            		<td align="right" style="text-align:right; color:red"><b><?php echo numIndo($selisih2); ?></b></td>
            		<th>&nbsp;</th>
                </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
        		<?php echo anchor(site_url('t97_saldoawal/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        		<?php echo anchor(site_url('t97_saldoawal/word'), 'Word', 'class="btn btn-primary"'); ?>
    	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
