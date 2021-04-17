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
        <h2 style="margin-top:0px">T31_bayar <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group">
            	<label for="int">NAME <?php echo form_error('idtamu') ?></label>
                <input type="hidden" name="idtamu" value="<?php echo $idtamu; ?>" />
            	<input type="text" class="form-control" value="<?php echo $Name; ?>" readonly />
        	</div>

            <div class="form-group">
            	<label for="int">PAID BY <?php echo form_error('PaidBy') ?></label>
            	<!-- <input type="text" class="form-control" name="idtamu" id="idtamu" placeholder="Idtamu" value="<?php echo $idtamu; ?>" /> -->
                <select class="form-control" name="PaidBy">
                    <?php foreach($dataTamu as $dTamu) { ?>
                        <option value="<?php echo $dTamu->idtamu ?>" <?php echo ($dTamu->idtamu == $PaidBy) ? "selected" : "" ?>><?php echo $dTamu->Name ?></option>
                    <?php } ?>
                </select>
        	</div>

            <!-- data pembayaran detail -->
            <table class="table table-bordered" style="margin-bottom: 10px; white-space: nowrap;">
                <tr>
                    <th colspan="3">PAYMENT</th>
                </tr>
                <tr>
                    <th>TYPE</th>
                    <th>TGL. BAYAR</th>
                    <th>JUMLAH</th>
                </tr>
                <?php foreach($dataTop as $dTop) { ?>
                    <tr>
                        <td><?php echo $dTop->Type ?></td>
                        <td>
                            <div class="input-group date" id="_tglbayar<?php echo $dTop->idtop?>" data-target-input="nearest">
                                <div class="input-group-append" data-target="#_tglbayar<?php echo $dTop->idtop?>" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <?php $key = array_search($dTop->idtop, array_column($dataBayard, 'idtop'), true) ?>
                                <input placeholder="TGL. BAYAR" type="text" name="_tglbayar<?php echo $dTop->idtop?>" value="<?= (FALSE !== $key) ? dateIndo($dataBayard[$key]->TglBayar) : '' ?>" class="form-control datetimepicker-input" data-target="#_tglbayar<?php echo $dTop->idtop?>"/>
                            </div>
                            <script>
                                $(document).ready(function () {
                                    $('#_tglbayar<?php echo $dTop->idtop?>').datetimepicker({
                                        format: 'DD-MM-YYYY'
                                    });
                                })
                            </script>
                        </td>
                        <?php $key = array_search($dTop->idtop, array_column($dataBayard, 'idtop'), true) ?>
                        <td><input type="text" class="form-control" name="_<?php echo $dTop->idtop?>" value="<?= (FALSE !== $key) ? $dataBayard[$key]->Jumlah : '0' ?>" /></td>
                    </tr>
                <?php } ?>
            </table>

            <!-- data pembayaran detail -->
            <?php //foreach($dataTop as $dTop) { ?>
            <!-- <div class="form-group">
                <label for="int"><?php echo $dTop->Type ?></label>
                <?php $key = array_search($dTop->idtop, array_column($dataBayard, 'idtop'), true) ?>
                <input type="text" class="form-control" name="_<?php echo $dTop->idtop?>" value="<?= (FALSE !== $key) ? $dataBayard[$key]->Jumlah : '0' ?>" />
            </div> -->
            <?php //} ?>

            <!-- data pembayaran selisih -->
            <table class="table table-bordered" style="margin-bottom: 10px; white-space: nowrap;">
                <tr>
                    <th colspan="3">SELISIH</th>
                </tr>
                <tr>
                    <th>TYPE</th>
                    <th>JUMLAH</th>
                </tr>
                <?php foreach($dataTos as $dTos) { ?>
                    <tr>
                        <td><?php echo $dTos->Type ?></td>
                        <?php $key = array_search($dTos->idtos, array_column($dataBayars, 'idtos'), true) ?>
                        <td><input type="text" class="form-control" name="__<?php echo $dTos->idtos?>" value="<?= (FALSE !== $key) ? $dataBayars[$key]->Jumlah : '0' ?>" /></td>
                    </tr>
                <?php } ?>
            </table>

            <?php //foreach($dataTos as $dTos) { ?>
            <!-- <div class="form-group">
                <label for="int"><?php echo $dTos->Type ?></label>
                <?php $key = array_search($dTos->idtos, array_column($dataBayars, 'idtos'), true) ?>
                <input type="text" class="form-control" name="__<?php echo $dTos->idtos?>" value="<?= (FALSE !== $key) ? $dataBayars[$key]->Jumlah : '0' ?>" />
            </div> -->
            <?php //} ?>

			<input type="hidden" name="idbayar" value="<?php echo $idbayar; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t31_bayar') ?>" class="btn btn-secondary">Batal</a>
		</form>
    <!-- </body>
</html> -->
