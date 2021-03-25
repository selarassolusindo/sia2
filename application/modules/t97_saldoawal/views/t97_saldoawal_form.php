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
        <h2 style="margin-top:0px">T97_saldoawal <?php echo $button ?></h2> -->
    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Idakun <?php echo form_error('idakun') ?></label>
            <select name="idakun" class="form-control" id="akun">
				<option value="">Akun</option>
				<?php
				// foreach($akun_data as $akun)
				// {
				// 	$selected = ($akun->idakun == $idakun) ? ' selected="selected"' : "";
				// 	echo '<option value="'.$akun->idakun.'" '.$selected.'>'.$akun->Kode . ' - ' . $akun->Nama.'</option>';
				// }
				?>
			</select>
        </div>
	    <div class="form-group">
            <label for="double">Debit <?php echo form_error('Debit') ?></label>
            <input type="text" class="form-control" name="Debit" id="Debit" placeholder="Debit" value="<?php echo $Debit; ?>" />
        </div>
	    <div class="form-group">
            <label for="double">Kredit <?php echo form_error('Kredit') ?></label>
            <input type="text" class="form-control" name="Kredit" id="Kredit" placeholder="Kredit" value="<?php echo $Kredit; ?>" />
        </div>
	    <input type="hidden" name="idsa" value="<?php echo $idsa; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('t97_saldoawal') ?>" class="btn btn-default">Batal</a>
	</form>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#akun').select2({
                minimumInputLength: 3,
                allowClear: true,
                placeholder: 'Akun',
                ajax: {
                    dataType: 'json',
                    url: '<?php echo site_url(); ?>t98_akun/getData',
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
