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
                <input type="hidden" name="SelisihPL" value="<?php echo $SelisihPL; ?>" />
                <input type="hidden" name="Total" value="<?php echo $Total; ?>" />
                <input type="hidden" name="Selisih" value="<?php echo $Selisih; ?>" />
                <input type="hidden" name="ShareP" value="<?php echo $ShareP; ?>" />
                <input type="hidden" name="ShareS" value="<?php echo $ShareS; ?>" />
            	<input type="text" class="form-control" value="<?php echo $Name; ?>" readonly />
        	</div>

            <div class="form-group">
            	<label for="int">KURS <?php echo form_error('Kurs') ?></label>
            	<input type="text" class="form-control" name="Kurs" id="Kurs" placeholder="KURS" value="<?php echo $Kurs; ?>" readonly />
        	</div>

            <div class="form-group">
            	<label for="int">PRICE LIST (<?php echo DEFAULT_KURS ?>) <?php echo form_error('PriceList') ?></label>
            	<input type="text" class="form-control" name="PriceList" id="PriceList" placeholder="PRICE LIST" value="<?php echo $PriceList; ?>" />
        	</div>

            <div class="form-group">
            	<label for="int">PRICE TO PAY (RP)<?php echo form_error('PricePay') ?></label>
            	<input type="text" class="form-control" name="PricePay" id="PricePay" placeholder="PRICE TO PAY" value="<?php echo $PricePay; ?>" />
        	</div>

            <!-- data pembayaran selisih price list -->
            <table class="table table-bordered" style="margin-bottom: 10px; white-space: nowrap;">
                <tr>
                    <th colspan="3">SELISIH PRICE LIST</th>
                </tr>
                <tr>
                    <th>TYPE</th>
                    <th>JUMLAH</th>
                </tr>
                <?php foreach($dataTos2 as $dTos2) { ?>
                    <tr>
                        <td><?php echo $dTos2->Type ?></td>
                        <?php $key = array_search($dTos2->idtos2, array_column($dataBayars2, 'idtos2'), true) ?>
                        <td><input type="text" class="form-control" name="___<?php echo $dTos2->idtos2?>" value="<?= (FALSE !== $key) ? $dataBayars2[$key]->Jumlah : '0' ?>" /></td>
                    </tr>
                <?php } ?>
            </table>

            <div class="form-group">
                <input type="hidden" name="PaidByExisting" value="<?php echo $PaidBy ?>">
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
                    <th>MATA UANG</th>
                    <th>JUMLAH</th>
                    <th>JUMLAH (RP)</th>
                </tr>
                <?php $totalJumlahBayar = 0; ?>
                <?php foreach($dataTop as $dTop) { ?>
                    <tr>
                        <td><?php echo $dTop->Type ?></td>
                        <!-- <td>
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
                        </td> -->
                        <td><?php echo $dTop->CurrencyName ?></td>
                        <?php $key = array_search($dTop->idtop, array_column($dataBayard, 'idtop'), true) ?>
                        <td><input type="text" class="form-control" name="_<?php echo $dTop->idtop?>" value="<?= (FALSE !== $key) ? $dataBayard[$key]->Jumlah : '0' ?>" /></td>
                        <?php
                        $keyKurs = array_search($dTop->CurrencyName, array_column($kursHitung, 'MataUang'), true);
                        $jumlahBayar = ((FALSE !== $key) ? $dataBayard[$key]->Jumlah : '0') * ((FALSE !== $keyKurs) ? $kursHitung[$keyKurs]['Nilai'] : '1');
                        $totalJumlahBayar += $jumlahBayar;
                        ?>
                        <input type="hidden" class="form-control" name="_<?php echo $dTop->idtop?>_RP" value="<?= $jumlahBayar ?>" readonly>
                        <td class="text-right"><?php echo numIndo($jumlahBayar) ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="3" class="text-right"><b>TOTAL</b></td>
                    <input type="hidden" name="totalJumlahBayar" value="<?php echo $totalJumlahBayar ?>">
                    <td class="text-right"><b><?php echo numIndo($totalJumlahBayar); ?></b></td>
                </tr>
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
                    <th colspan="3">SELISIH PRICE TO PAY</th>
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
