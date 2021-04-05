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
        <h2>T03_bayar List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tamu</th>
		<th>PT</th>
		<th>Kurs</th>
		<th>Mata Uang</th>
		<th>Jumlah</th>
		<th>Paid By</th>
		<th>Idusers</th>
		<th>Created At</th>
		<th>Updated At</th>
		
            </tr><?php
            foreach ($t03_bayar_data as $t03_bayar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t03_bayar->Tamu ?></td>
		      <td><?php echo $t03_bayar->PT ?></td>
		      <td><?php echo $t03_bayar->Kurs ?></td>
		      <td><?php echo $t03_bayar->Mata_Uang ?></td>
		      <td><?php echo $t03_bayar->Jumlah ?></td>
		      <td><?php echo $t03_bayar->Paid_By ?></td>
		      <td><?php echo $t03_bayar->idusers ?></td>
		      <td><?php echo $t03_bayar->created_at ?></td>
		      <td><?php echo $t03_bayar->updated_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>