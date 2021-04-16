<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T33_bayars List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idbayar</th>
		<th>Idtos</th>
		<th>Jumlah</th>
		<th>Idusers</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($t33_bayars_data as $t33_bayars)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t33_bayars->idbayar ?></td>
		      <td><?php echo $t33_bayars->idtos ?></td>
		      <td><?php echo $t33_bayars->Jumlah ?></td>
		      <td><?php echo $t33_bayars->idusers ?></td>
		      <td><?php echo $t33_bayars->created_at ?></td>
		      <td><?php echo $t33_bayars->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>