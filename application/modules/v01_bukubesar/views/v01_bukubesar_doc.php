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
        <h2>V01_bukubesar List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idakun</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>Induk</th>
		<th>Urut</th>
		<th>Debit</th>
		<th>Kredit</th>
		
            </tr><?php
            foreach ($v01_bukubesar_data as $v01_bukubesar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $v01_bukubesar->idakun ?></td>
		      <td><?php echo $v01_bukubesar->Kode ?></td>
		      <td><?php echo $v01_bukubesar->Nama ?></td>
		      <td><?php echo $v01_bukubesar->Induk ?></td>
		      <td><?php echo $v01_bukubesar->Urut ?></td>
		      <td><?php echo $v01_bukubesar->Debit ?></td>
		      <td><?php echo $v01_bukubesar->Kredit ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>