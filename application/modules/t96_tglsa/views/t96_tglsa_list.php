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
        <h2 style="margin-top:0px">T96_tglsa List</h2> -->
        <!-- <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php //echo $total_rows == 1 ? '' : anchor(site_url('t96_tglsa/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t96_tglsa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t96_tglsa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div> -->
        <table class="table table-bordered col-2" style="margin-bottom: 10px">
            <!-- <tr>
                <th>No</th>
                <th>Tgl. Saldo Awal</th>
                <th>Action</th>
            </tr> -->
            <?php foreach ($t96_tglsa_data as $t96_tglsa) { ?>
            <tr>
    			<!-- <td width="80px"><?php echo ++$start ?></td> -->
                <td><?php echo date_format(date_create($t96_tglsa->TglSA), 'd-m-Y') ?></td>
    			<!-- <td> -->
    				<?php
    				// echo anchor(site_url('t96_tglsa/read/'.$t96_tglsa->idtglsa),'Read');
    				// echo ' | ';
    				// echo anchor(site_url('t96_tglsa/update/'.$t96_tglsa->idtglsa),'Ubah');
    				// echo ' | ';
    				// echo anchor(site_url('t96_tglsa/delete/'.$t96_tglsa->idtglsa),'Delete','onclick="javascript: return confirm(\'Are You Sure ?\')"');
    				?>
    			<!-- </td> -->
            </tr>
            <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a> -->
        		<?php //echo anchor(site_url('t96_tglsa/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        		<?php //echo anchor(site_url('t96_tglsa/word'), 'Word', 'class="btn btn-primary"'); ?>
                <?php echo $total_rows == 1 ? anchor(site_url('t97_saldoawal'),'Proses', 'class="btn btn-primary"') . ' ' . anchor(site_url('t96_tglsa/update/'.$t96_tglsa->idtglsa),'Ubah', 'class="btn btn-primary"') : anchor(site_url('t96_tglsa/create'),'Input Tgl. Saldo Awal', 'class="btn btn-primary"'); ?>
    	    </div>
            <div class="col-md-6 text-right">
                <?php //echo $pagination ?>
            </div>
        </div>
    <!-- </body>
</html> -->
