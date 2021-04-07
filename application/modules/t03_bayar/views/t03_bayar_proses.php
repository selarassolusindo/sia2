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
        <h2 style="margin-top:0px">T03_bayar <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
			<div class="form-group col-2">
            	<!-- <label for="varchar">TripNo <?php echo form_error('TripNo') ?></label> -->
            	<!-- <input type="text" class="form-control" name="TripNo" id="TripNo" placeholder="TripNo" value="<?php echo $TripNo; ?>" /> -->
                <!-- <label for="varchar">Trip No. <?php echo form_error('TripNo') ?></label> -->
                <!-- <select name="TripNo" class="form-control" id="TripNo"> -->
    				<!-- <option value="">Trip No.</option> -->
                    <!-- <option value="<?php echo $TripNo ?>" selected="selected"><?php echo $TripNo; ?></option> -->
    				<?php
    				// foreach($akun_data as $akun)
    				// {
    				// 	$selected = ($akun->idakun == $idakun) ? ' selected="selected"' : "";
    				// 	echo '<option value="'.$akun->idakun.'" '.$selected.'>'.$akun->Kode . ' - ' . $akun->Nama.'</option>';
    				// }
    				?>
    			<!-- </select> -->
                Trip No. <b><?php echo $TripNo ?></b> @ <b><?php echo dateIndo($TripTgl) ?></b>
        	</div>

            <style media="screen">
                .testimonial-group > .row {
                    display: block;
                    /* overflow-x: auto; */
                    white-space: nowrap;
                    }
                .testimonial-group > .row > [class*='col-'] {
                    display: inline-block;
                    /* border-style: groove; */
                    }
                .hx {
                    /* border-style: border-1; */
                    border-style: solid;
                    border-width: 1px;
                    border-radius: 3px;
                }
            </style>

            <div class="container testimonial-group">

                <!-- header -->
                <div class="row text-center">
                    <div class="col-1 hx">TAMU
                        <div class="row">
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-1 hx">PT
                        <div class="row">
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-3 hx">KURS
                        <div class="row">
                            <div class="col">USD</div>
                            <div class="col">AUD</div>
                        </div>
                    </div>
                    <div class="col-10 hx">PAYMENT
                        <div class="row">
                            <div class="col">USD</div>
                            <div class="col">AUD</div>
                            <div class="col">PAYPAL</div>
                            <div class="col">BCA $</div>
                            <div class="col">RP</div>
                            <div class="col">CC BCA</div>
                            <div class="col">CC MDR</div>
                            <div class="col">TOTAL RP</div>
                        </div>
                    </div>
                    <div class="col-2 hx">SELISIH
                        <div class="row">
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                    <div class="col-7 hx">SELISIH
                        <div class="row">
                            <div class="col">BLM BAYAR</div>
                            <div class="col">KRG BAYAR</div>
                            <div class="col">DISCOUNT</div>
                            <div class="col">CHARGE CC</div>
                            <div class="col">SLSH KURS</div>
                        </div>
                    </div>
                    <div class="col-3 hx">SHARE INCOME
                        <div class="row">
                            <div class="col">PIW</div>
                            <div class="col">SSW</div>
                        </div>
                    </div>
                    <div class="col-1 hx">PAID BY
                        <div class="row">
                            <div class="col">&nbsp;</div>
                        </div>
                    </div>
                </div>
                <!-- /header -->

                <!-- data -->
                <?php foreach ($dataTamu as $key => $d) { ?>

                    <div class="row">

                        <!-- tamu -->
                        <div class="col-1">
                            <input type="hidden" name="tamu[]" value="<?php echo $d->tamu ?>">
                            <?php echo $d->Nama ?>
                        </div>

                        <!-- pt -->
                        <div class="col-1">
                            <select class="form-control" name="pt_ci[]" required>
                                <option value=""></option>
                                <option value="3" selected="<?php echo $d->pt_ci == 3 ? 'selected' : '' ?>">PIW</option>
                                <option value="4" selected="<?php echo $d->pt_ci == 4 ? 'selected' : '' ?>">SSW</option>
                            </select>
                        </div>

                        <!-- kurs -->
                        <div class="col-3">
                            <div class="row">
                                <div class="col">
                                    <input type="number" name="kurs_usd_ci[]" class="form-control" placeholder="" value="<?= $d->kurs_usd_ci ?>" required>
                                </div>
                                <div class="col">
                                    <input type="number" name="kurs_aud_ci[]" class="form-control" placeholder="" value="<?= $d->kurs_aud_ci ?>" required></td>
                                </div>
                            </div>
                        </div>

                        <!-- payment ci -->
                        <div class="col-10">
                            <div class="row">
                                <div class="col">
                                    <input type="number" name="usd_ci[]" class="form-control" placeholder="" value="<?= $d->usd_ci ?>" required></td>
                                </div>
                                <div class="col">
                                    <input type="number" name="aud_ci[]" class="form-control" placeholder="" value="<?= $d->aud_ci ?>" required></td>
                                </div>
                                <div class="col">
                                    <input type="number" name="paypal_ci[]" class="form-control" placeholder="" value="<?= $d->paypal_ci ?>" required></td>
                                </div>
                                <div class="col">
                                    <input type="number" name="bca_d_ci[]" class="form-control" placeholder="" value="<?= $d->bca_d_ci ?>" required></td>
                                </div>
                                <div class="col">
                                    <input type="number" name="rp_ci[]" class="form-control" placeholder="" value="<?= $d->rp_ci ?>" required></td>
                                </div>
                                <div class="col">
                                    <input type="number" name="cc_bca_ci[]" class="form-control" placeholder="" value="<?= $d->cc_bca_ci ?>" required></td>
                                </div>
                                <div class="col">
                                    <input type="number" name="cc_mdr_ci[]" class="form-control" placeholder="" value="<?= $d->cc_mdr_ci ?>" required></td>
                                </div>
                                <div class="col">
                                    <input type="number" name="tot_rp_ci[]" class="form-control" placeholder="" value="<?= $d->tot_rp_ci ?>" required></td>
                                </div>
                            </div>
                        </div>

                        <!-- selisih -->
                        <div class="col-2">
                            <input type="number" name="slsh_ci[]" class="form-control" placeholder="" value="<?= $d->slsh_ci ?>" required></td>
                        </div>

                        <!-- selisih breakdown -->
                        <div class="col-7">
                            <div class="row">
                                <div class="col">
                                    <input type="number" name="slsh_blm_ci[]" class="form-control" placeholder="" value="<?= $d->slsh_blm_ci ?>" required></td>
                                </div>
                                <div class="col">
                                    <input type="number" name="slsh_krg_ci[]" class="form-control" placeholder="" value="<?= $d->slsh_krg_ci ?>" required></td>
                                </div>
                                <div class="col">
                                    <input type="number" name="slsh_disc_ci[]" class="form-control" placeholder="" value="<?= $d->slsh_disc_ci ?>" required></td>
                                </div>
                                <div class="col">
                                    <input type="number" name="slsh_chrg_ci[]" class="form-control" placeholder="" value="<?= $d->slsh_chrg_ci ?>" required></td>
                                </div>
                                <div class="col">
                                    <input type="number" name="slsh_kurs_ci[]" class="form-control" placeholder="" value="<?= $d->slsh_kurs_ci ?>" required></td>
                                </div>
                            </div>
                        </div>

                        <!-- share income -->
                        <div class="col-3">
                            <div class="row">
                                <div class="col">
                                    <input type="number" name="sha_inc_piw[]" class="form-control" placeholder="" value="<?= $d->sha_inc_piw ?>" required></td>
                                </div>
                                <div class="col">
                                    <input type="number" name="sha_inc_ssw[]" class="form-control" placeholder="" value="<?= $d->sha_inc_ssw ?>" required></td>
                                </div>
                            </div>
                        </div>

                        <!-- paid by -->
                        <div class="col-1">
                            <input type="number" name="paid_by[]" class="form-control" placeholder="" value="<?= $d->paid_by ?>" required></td>
                        </div>

                    </div>

                <?php } ?>
                <!-- /data -->

            </div>

			<!-- <div class="form-group">
            	<label for="date">TripTgl <?php echo form_error('TripTgl') ?></label>
            	<input type="text" class="form-control" name="TripTgl" id="TripTgl" placeholder="TripTgl" value="<?php echo $TripTgl; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="double">Total <?php echo form_error('Total') ?></label>
            	<input type="text" class="form-control" name="Total" id="Total" placeholder="Total" value="<?php echo $Total; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="tinyint">Idusers <?php echo form_error('idusers') ?></label>
            	<input type="text" class="form-control" name="idusers" id="idusers" placeholder="Idusers" value="<?php echo $idusers; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="timestamp">Created At <?php echo form_error('created_at') ?></label>
            	<input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        	</div> -->
			<!-- <div class="form-group">
            	<label for="timestamp">Updated At <?php echo form_error('updated_at') ?></label>
            	<input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        	</div> -->
            <p>&nbsp;</p>
			<input type="hidden" name="idbayar" value="<?php echo $idbayar; ?>" />
			<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
			<a href="<?php echo site_url('t03_bayar') ?>" class="btn btn-secondary">Kembali</a>
		</form>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#TripNo').select2({
                    minimumInputLength: 3,
                    allowClear: true,
                    placeholder: 'Trip No.',
                    ajax: {
                        dataType: 'json',
                        url: '<?php echo site_url(); ?>t02_tamu/getData',
                        delay: 800,
                        data: function(params) {
                            return {
                                search: params.term
                            }
                        },
                        processResults: function (data, page) {
                            return {
                                results: data
                            };
                        },
                    }
                });
            });
        </script>
    <!-- </body>
</html> -->
