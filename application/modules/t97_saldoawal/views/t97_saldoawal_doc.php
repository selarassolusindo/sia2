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
        <h2>T97_saldoawal List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idakun</th>
		<th>Debit</th>
		<th>Kredit</th>
		<th>Idusers</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($t97_saldoawal_data as $t97_saldoawal)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t97_saldoawal->idakun ?></td>
		      <td><?php echo $t97_saldoawal->Debit ?></td>
		      <td><?php echo $t97_saldoawal->Kredit ?></td>
		      <td><?php echo $t97_saldoawal->idusers ?></td>
		      <td><?php echo $t97_saldoawal->created_at ?></td>
		      <td><?php echo $t97_saldoawal->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>